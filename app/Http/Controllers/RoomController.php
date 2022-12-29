<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

    function index(){
        $listRooms = Room::get();
        return view('user.pages.room', compact('listRooms'));
    }

}
