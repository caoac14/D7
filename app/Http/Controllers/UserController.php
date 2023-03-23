<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\TypeDevice;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\GroupRoom;
use App\Models\ClassName;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupDevice;
use App\Models\Report;
use App\Models\Problem;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Mail;
use App\Mail\FixNow;



class UserController extends Controller
{
    function showGroupRoom()
    {
        $listGroupRooms = GroupRoom::orderBy('ten_day_phong')->get();
        return view('user.groupRoom', compact('listGroupRooms'));
    }

    function showTypeRoom(Request $request)
    {
        $id = $request->id;
        $check = GroupRoom::where('id', $request->id)->first();

        if ($check) {

            $typeRoomLists = TypeRoom::orderBy('ten_loai_phong', 'ASC')->get();

            $nameTypeRoom = TypeRoom::orderBy('ten_loai_phong', 'ASC')->pluck('ten_loai_phong');

            $roomLists = array();
            foreach ($typeRoomLists as $i) {
                array_push($roomLists, Room::where('ma_nhom_phong', $id)->where('ma_loai_phong', $i->id)
                    ->join('loai_phong', 'loai_phong.id', '=', 'phong.ma_loai_phong')
                    ->select('phong.id', 'ten_phong', 'ten_loai_phong')->orderBy('ten_phong', 'ASC')->get());
            }
            $groupRoomSelected = GroupRoom::where('id', $id)->first();

            return view('user.typeRoom', compact('roomLists', 'groupRoomSelected', 'nameTypeRoom'));
        } else {
            abort(403);
        }
    }

    function showRoom(Request $request)
    {
        $id = $request->id;
        $check = Room::where('id', $id)->first();
        if ($check) {
            $idDevices = TypeDevice::pluck('id');

            $typeOfDevice = array();
            foreach ($idDevices as $idType) {
                $queryTypeDevice = Device::where('ma_phong', $id)->where('ma_loai_thiet_bi', $idType)->orderBy('ten_thiet_bi', 'ASC')->get();
                array_push($typeOfDevice, $queryTypeDevice);
            }
            $nameTypes = TypeDevice::select('id', 'ten_loai_thiet_bi')->get();

            $roomName = Room::where('id', $id)->first();

            return view('user.room', compact('typeOfDevice', 'nameTypes', 'roomName'));
        } else {
            abort(403);
        }
    }

    function showDevice(Request $request)
    {
        $id = $request->id;
        $idRoomRequest = $request->roomId;
        $idTypeDeviceRequest = $request->typeDeviceId;

        $roomName = Room::where('id', $idRoomRequest)->first();
        $typeDeviceName = TypeDevice::where('id', $idTypeDeviceRequest)->first();

        $typeDeviceLists = Device::orderBy('ten_thiet_bi', 'DESC')->where('ma_phong', $idRoomRequest)->where('ma_loai_thiet_bi', $request->typeDeviceId)->get();

        return view('user.device', compact('typeDeviceLists', 'roomName', 'typeDeviceName'));
    }




    function pageReport(Request $request)
    {
        $IdUser = Auth::user()->id;
        $deviceId = $request->devide;
        $deviceName = Device::where('id', $deviceId)->pluck('ten_thiet_bi');

        $listRooms = GroupRoom::orderBy('ten_day_phong', 'ASC')->get();

        $historyReport = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
            ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
            ->orderBy('nhat_ky.trang_thai', 'DESC')->orderBy('nhat_ky.created_at', 'DESC')
            ->select(
                'ten_phong',
                'ma_lop',
                'buoi',
                'ngay',
                'mo_ta_loi',
                'trang_thai',
                'nhat_ky.id'
            )->where('ma_giao_vien', $IdUser)->take(5)->get();
        $rooms = Room::orderBy('ten_phong', 'ASC')->get();

        return view('user.report', compact('listRooms', 'deviceName', 'historyReport', 'rooms'));
    }

    function editReport(Request $request, $id)
    {
        $mo_ta_loi = $request->mo_ta_loi;
        $oldAbout = Report::where('id', $id)->pluck('mo_ta_loi');
        if ($oldAbout[0] != $mo_ta_loi) {
            printf("Cos thay ddoi");
            Report::where('id', $id)->update(['mo_ta_loi' => $mo_ta_loi]);
        } else {
            return redirect()->back();
        }
        return redirect()->back();
    }

    function deleteReport($id)
    {

        GroupDevice::where('ma_nhat_ky', $id)->delete();
        Report::where('id', $id)->delete();
        return redirect()->back();
    }

    function showImage(Request $request)
    {
        $soDoBoTri = Room::where('id', $request->so_do)->pluck('so_do_bo_tri');
        if ($soDoBoTri[0] != null) {
            return redirect()->away(asset($soDoBoTri[0]));
        } else {
            return redirect()->back();
        }
    }


    function showRoomAjax(Request  $request)
    {
        if ($request->ajax()) {
            $rooms = Room::where('ma_nhom_phong', $request->groupRoom_id)->orderBy('ten_phong', 'ASC')->get();
            return response()->json($rooms);
        }
    }

    function showDeviceAjax(Request $request)
    {
        if ($request->ajax()) {
            $typeDevices = TypeDevice::select('id', 'ten_loai_thiet_bi')->get();
            $devices = Device::where('ma_phong', $request->room_id)->orderBy('ten_thiet_bi', 'ASC')->select('id', 'ma_loai_thiet_bi', 'ten_thiet_bi')->get();
            return response()->json([$typeDevices, $devices]);
        }
    }

    function FixNow($name, $time, $email, $room, $about)
    {
        $testMailData = [
            'name' => $name,
            'time' => $time,
            'email' => $email,
            'room' => $room,
            'about' => $about,
        ];

        Mail::to("quochuy@gmail.com")->send(new FixNow($testMailData));
        return true;
    }


    function setDataReport(Request $request)
    {

        if ($request->fixNow == "true") {
            $mailSended = $this->FixNow(Auth::user()->name, $request->dateR, Auth::user()->email, Room::where('id', $request->room)->pluck("ten_phong"), $request->about);
        }

        $report = new Report;
        $report->ma_giao_vien = Auth::user()->id;
        $report->ma_phong = $request->room;
        $report->ma_lop = $request->class;
        if (is_null($request->device)) {
            $report->mo_ta_loi = "Bình thường";
            $report->trang_thai = 0;
        } else {
            $report->mo_ta_loi = $request->about;
            $report->trang_thai = 1;
        }

        $report->buoi = $request->timeR;
        $report->ngay = $request->dateR;
        $report->ghi_chu = "";
        $report->save();


        $idLastReport = Report::get()->last()->id;
        if ($request->device) {
            foreach ($request->device as $device) {
                $groupDevice = new GroupDevice();
                $groupDevice->ma_nhat_ky = $idLastReport;
                $groupDevice->ma_thiet_bi = $device;
                $groupDevice->save();
            }
        }

        return redirect()->back()->with('saved', 'Đã lưu thành công nhật ký ngày ' . date('d-m-Y', strtotime($report->ngay)));
    }


    function problemReport(Request $request, $id)
    {
        if ($request->id == null) {
            abort(403);
        }


        $problem = new Problem;
        $problem->ma_giao_vien = Auth::user()->id;
        $problem->ma_phong = $request->phong;
        $problem->mo_ta_loi = $request->mo_ta_loi;
        $problem->ma_thiet_bi = $id;
        $problem->ngay = date('Y-m-d H:i:s');
        $problem->trang_thai = "1";
        $problem->save();

        return redirect()->back()->with('problemed', 'Báo cáo sự cố thành công. Đang đợi xử lý... ');
    }
}
