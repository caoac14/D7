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
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

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
                    ->select('phong.id', 'ten_phong', 'ten_loai_phong')->get());
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

        $typeDeviceLists = Device::orderBy('ten_thiet_bi', 'ASC')->where('ma_phong', $idRoomRequest)->where('ma_loai_thiet_bi', $request->typeDeviceId)->get();

        return view('user.device', compact('typeDeviceLists', 'roomName', 'typeDeviceName'));
    }




    function pageReport(Request $request)
    {
        $deviceId = $request->devide;
        $deviceName = Device::where('id', $deviceId)->pluck('ten_thiet_bi');

        $listRooms = GroupRoom::orderBy('ten_day_phong', 'ASC')->get();

        $classNames = ClassName::orderBy('ten_lop', 'ASC')->get();

        return view('user.report', compact('listRooms', 'deviceName', 'classNames'));
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
            $devices = Device::where('ma_phong', $request->room_id)->orderBy('ten_thiet_bi', 'ASC')->get();
            return response()->json($devices);
        }
    }

    function setDataReport(Request $request)
    {
        $report = new Report;
        $report->ma_giao_vien = Auth::user()->id;
        $report->ma_phong = $request->room;
        $report->ma_lop = $request->class;
        if($report->mo_ta_loi != ""){
            $report->mo_ta_loi = $request->about;
            $report->trang_thai = 0;
        }else{
            $report->mo_ta_loi = "OK";
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

        return redirect()->back();
    }
}
