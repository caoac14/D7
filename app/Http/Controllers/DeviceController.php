<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\TypeDevice;
use App\Models\Room;
use App\Models\GroupRoom;

class DeviceController extends Controller
{
    function index()
    {
        $listGroupRooms = GroupRoom::orderBy('ten_day_phong')->get();
        return view('user.pages.room', compact('listGroupRooms'));
    }


    function deviceOfRoom($id)
    {

        $idDevices = TypeDevice::pluck('id');
    
        $nameTypes = TypeDevice::pluck('ten_loai_thiet_bi');

        $listDevices = Device::where('ma_phong', $id)->get();

        $typeOfDevice = array();
        foreach ($idDevices as $idType) {
            $queryTypeDevice = (Device::where('ma_phong', $id)->where('ma_loai_thiet_bi', $idType)->orderBy('ten_thiet_bi', 'ASC')->get());
            array_push($typeOfDevice, $queryTypeDevice);
        }

        $room = Room::where('id', $id)->pluck('ten_phong');

        return view('user.pages.device', compact('listDevices', 'room', 'typeOfDevice', 'nameTypes'));
    }
}
