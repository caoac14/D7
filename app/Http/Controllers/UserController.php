<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\TypeDevice;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\GroupRoom;
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
        $check = Room::where('id',$id)->first();
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
        $id= $request->id;
        $idRoomRequest = $request->roomId;
        $idTypeDeviceRequest = $request->typeDeviceId;

        $roomName = Room::where('id', $idRoomRequest)->first();
        $typeDeviceName = TypeDevice::where('id', $idTypeDeviceRequest)->first();

        $typeDeviceLists = Device::orderBy('ten_thiet_bi', 'ASC')->where('ma_phong', $idRoomRequest)->where('ma_loai_thiet_bi', $request->typeDeviceId)->get();

        return view('user.device', compact('typeDeviceLists', 'roomName', 'typeDeviceName'));
    }
}
