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
use App\Models\TypeDevice;
use App\Mail\SendMail;
use App\Mail\ResetMail;
use Dflydev\DotAccessData\Data;

class AdminController extends Controller
{
    function createAdmin(){
        $random_pass = (Str::random(10));
        $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
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
                'ten_phong',
                'ma_lop',
                'ten_lop',
                'buoi',
                'ngay',
                'mo_ta_loi',
                'nhat_ky.id'
            )
            ->paginate(20);
        return view('admin.report', compact('reportList'));
    }




    // function of Device
    function showDevicePage()
    {
        $roomLists = Room::orderBy('ten_phong', 'ASC')->get();
        return view('admin.device', compact('roomLists'));
    }

    function showDeviceOfRoom($id)
    {
        $nameTypes = TypeDevice::pluck('ten_loai_thiet_bi');

        $listDevices = Device::where('ma_phong', $id)->get();
        $idDevices = TypeDevice::pluck('id');

        $typeOfDevice = array();
        foreach ($idDevices as $idType) {
            $queryTypeDevice = Device::where('ma_phong', $id)->where('ma_loai_thiet_bi', $idType)->orderBy('ten_thiet_bi', 'ASC')->get();
            array_push($typeOfDevice, $queryTypeDevice);
        }


        $typeDeviceLists = TypeDevice::orderBy('ten_loai_thiet_bi', 'ASC')->get();

        $room = Room::where('id', $id)->pluck('ten_phong');

        return view('admin.device_detail', compact('listDevices', 'id', 'room', 'typeOfDevice', 'nameTypes', 'typeDeviceLists'));
    }

    function addDevice(Request $request, $id)
    {
        $device = new Device();
        $device->ma_phong = $id;
        $device->ma_loai_thiet_bi = $request->type_device;
        $device->ten_thiet_bi = $request->name_device;
        $device->save();
        return redirect()->back();
    }

    function addRoom(Request $request)
    {
        $room = new Room();
        $room->ten_phong = $request->name_room;
        $room->so_do_bo_tri = $request->so_do_bo_tri;

        $room->save();
        return redirect()->back();
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
        $temp = (implode(",",$dataReport));
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
