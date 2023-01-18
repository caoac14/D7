<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Report;
use App\Models\User;
use App\Models\Device;
use App\Models\Room;
use App\Models\GroupDevice;
use App\Models\TypeDevice;
use App\Models\GroupRoom;
use App\Models\TypeRoom;
use App\Mail\SendMail;
use App\Mail\ResetMail;
use Dflydev\DotAccessData\Data;

class AdminController extends Controller
{
    function createAdmin()
    {
        $random_pass = (Str::random(10));
        $user = new User();
        $user->name = "Trương Quốc Huy";
        $user->email = "quochuy@gmail.com";
        $user->chuc_vu = "";
        $user->hoc_vi = "";
        $user->sdt = "";
        $user->password = Hash::make($random_pass);
        $user->save();

        $mailSended = $this->sendMail("Trương Quốc Huy", "quochuy@gmail.com", $random_pass);
    }


    function showHomePage()
    {
        return view('admin.home');
    }

    function showReportPage()
    {
        $reportList = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
            ->join('lop', 'lop.id', '=', 'nhat_ky.ma_lop')
            ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
            ->orderBy('nhat_ky.created_at', 'DESC')
            ->select(
                'name',
                'email',
                'ten_phong',
                'ma_lop',
                'ten_lop',
                'buoi',
                'ngay',
                'mo_ta_loi',
                'nhat_ky.id'
            )->paginate(30);

        $groupDeviceList = GroupDevice::join('thiet_bi', 'thiet_bi.id', '=', 'nhom_thiet_bi.ma_thiet_bi')
            ->select('ma_nhat_ky', 'ten_thiet_bi')->get();


        return view('admin.report', compact('reportList', 'groupDeviceList'));
    }



    function showDevicePage()
    {
        $roomLists = Room::orderBy('ten_phong', 'ASC')->get();
        $groupRoomLists = GroupRoom::orderBy('ten_day_phong', 'ASC')->get();

        return view('admin.device', compact('roomLists', 'groupRoomLists'));
    }

    function showDeviceOfRoom($id)
    {

        $idDevices = TypeDevice::pluck('id');

        $typeOfDevice = array();
        foreach ($idDevices as $idType) {
            $queryTypeDevice = Device::where('ma_phong', $id)->where('ma_loai_thiet_bi', $idType)->orderBy('ten_thiet_bi', 'ASC')->get();
            array_push($typeOfDevice, $queryTypeDevice);
        }
        $nameTypes = TypeDevice::select('id', 'ten_loai_thiet_bi')->get();

        $roomName = Room::where('id', $id)->first();

        return view('admin.device_room', compact('id', 'typeOfDevice', 'nameTypes', 'roomName'));
    }

    function showDeviceDetail(Request $request)
    {
        $idRoomRequest = $request->roomId;
        $idTypeDeviceRequest = $request->typeDeviceId;

        $roomName = Room::where('id', $idRoomRequest)->first();
        $typeDeviceName = TypeDevice::where('id', $idTypeDeviceRequest)->first();

        $typeDeviceLists = Device::orderBy('ten_thiet_bi', 'ASC')->where('ma_phong', $idRoomRequest)->where('ma_loai_thiet_bi', $request->typeDeviceId)->get();

        return view('admin.device_detail', compact('typeDeviceLists', 'roomName', 'typeDeviceName'));
    }

    function addDevice(Request $request)
    {
        $device = new Device();
        $device->ma_phong =  $request->roomId;
        $device->ma_loai_thiet_bi = $request->typeDeviceId;
        $device->ten_thiet_bi = $request->name_device;
        $device->save();
        return redirect()->back();
    }

    function deleteDevice($id)
    {
        $checkGroupDevice =  GroupDevice::where('ma_thiet_bi', $id)->exists();
        if ($checkGroupDevice) {
            GroupDevice::where('ma_thiet_bi', $id)->delete();
        }

        $device =  Device::where('id', $id)->delete();
        return redirect()->back();
    }

    function addTypeDevice(Request $request)
    {
        $type_device = new TypeDevice();
        $type_device->ten_loai_thiet_bi = $request->name_typedevice;
        $type_device->save();
        return redirect()->back();
    }


    // Route of room

    function addRoom(Request $request)
    {
        $room = new Room();
        $room->ten_phong = $request->ten_phong;
        $room->so_do_bo_tri = "";
        $room->ma_nhom_phong = $request->ma_nhom_phong;
        $room->ma_loai_phong = $request->ma_loai_phong;

        $room->save();
        return redirect()->back();
    }


    function addGroupRoom(Request $request)
    {
        $groupRoom = new GroupRoom();
        $groupRoom->ten_day_phong = $request->ten_day_phong;
        $groupRoom->save();
        return redirect()->back();
    }

    function uploadImageRoom(Request $request){
        $request->validate([
            'room_image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $imageName = time().'.'.$request->room_image->extension();
        
        $request->room_image->move(public_path('images/room'), $imageName);
        $getImage = 'images/room/'.$imageName;
        Room::where('id',$request->id)->update(['so_do_bo_tri' => $getImage]);

        return back();
        // return back()->with('success', 'Image uploaded Successfully!')
        // ->with('image', $imageName);
    }

    function showGroupRoom($id)
    {
        $typeRoomLists = TypeRoom::orderBy('ten_loai_phong', 'ASC')->get();

        $nameTypeRoom = TypeRoom::orderBy('ten_loai_phong', 'ASC')->pluck('ten_loai_phong');

        $roomLists = array();
        foreach ($typeRoomLists as $i) {
            array_push($roomLists, Room::where('ma_nhom_phong', $id)->where('ma_loai_phong', $i->id)
                ->join('loai_phong', 'loai_phong.id', '=', 'phong.ma_loai_phong')
                ->select('phong.id', 'ten_phong', 'ten_loai_phong')->get());
        }

        $groupRoomSelected = GroupRoom::where('id', $id)->first();
        $groupRoomLists = GroupRoom::orderBy('ten_day_phong', 'ASC')->get();

        return view('admin.room', compact('roomLists', 'typeRoomLists', 'groupRoomLists', 'groupRoomSelected', 'nameTypeRoom'));
    }





    // function of Chart
    function showChartPage()
    {
        $countReport = Report::count();
        $countDevice = Device::count();
        $countUser = User::count();

        $dataReport = array();
        for ($i = 1; $i <= 31; $i++) {
            array_push($dataReport, Report::whereDay('ngay', $i)->whereMonth('ngay', now()->month)->count());
        }
        $temp = (implode(",", $dataReport));
        $totalData = ($temp);

        return view('admin.chart', compact('countReport', 'countDevice', 'countUser', "totalData"));
    }





    // function of Account
    function showAccountPage()
    {
        $userLists = User::orderBy('name', 'ASC')->paginate(20);
        return view('admin.account', compact('userLists'));
    }

    function showDetailAccountPage()
    {
        return view('admin.account_detail');
    }

    function showRegisterAccount()
    {
        $user = new User();
        return view('admin.register_account');
    }

    function updateAccount(Request $request, $id)
    {
        User::where('id', $id)
            ->update(['name' => $request->name, 'chuc_vu' => $request->chuc_vu, 'hoc_vi' => $request->hoc_vi, 'sdt' => $request->sdt]);
        return redirect('admin/account');
    }

    function mailResetPassword($name, $email, $password)
    {
        $data_mail = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        Mail::to($email)->send(new ResetMail($data_mail));
        // return true;
    }

    function resetPassword($id)
    {
        $random_pass = (Str::random(10));

        $user = User::where('id', $id)->first();

        User::where('id', $id)->update(['password' => Hash::make($random_pass)]);

        $this->mailResetPassword($user->name, $user->email, $random_pass);

        return redirect('admin/account');
    }





    // function of Report
    function showDetailReportPage($id)
    {
        return view('admin.report_detail');
    }





    // function of Mail
    function sendMail($name, $email, $password)
    {
        $testMailData = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        Mail::to($email)->send(new SendMail($testMailData));
        return true;
    }


    function postRegisterAccount(Request $request)
    {
        $random_pass = (Str::random(10));

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->chuc_vu = "";
        $user->hoc_vi = "";
        $user->sdt = "";
        $user->password = Hash::make($random_pass);

        $mailSended = $this->sendMail($request->name, $request->email, $random_pass);
        if ($mailSended) {
            $user->save();
            return redirect('admin/account');
        } else {
            return redirect('admin/register_account');
        }
    }
}