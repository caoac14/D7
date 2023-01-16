<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\TypeDevice;
use App\Models\Room;
use App\Models\GroupRoom;

class DeviceController extends Controller
{
    function showGroupRoom()
    {
        $listGroupRooms = GroupRoom::orderBy('ten_day_phong')->get();
        return view('user.pages.groupRoom', compact('listGroupRooms'));
    }

}
