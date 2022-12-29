<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Room;

class DeviceController extends Controller
{
    function index()
    {
        // $listRooms = Device::get();
        // return view('user.pages.room', compact('listRooms'));
    }
    

    function deviceOfRoom($id)
    {
        $listDevices = Device::where('ma_phong', $id)->get();
        $room = Room::where('id', $id)->pluck('ten_phong');
        return view('user.pages.device', compact('listDevices','room'));
    }
}
