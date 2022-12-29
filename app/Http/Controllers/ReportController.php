<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Room;

class ReportController extends Controller
{
    function index(Request $request)
    {
        $deviceId = $request->devide;
        $deviceName = Device::where('id', $deviceId)->pluck('ten_thiet_bi');

        $listRooms = Room::get();

        return view('user.pages.report', compact('listRooms', 'deviceName'));
    }

    function showDevice(Request $request)
    {
        if ($request->ajax()) {
            $devices = Device::where('ma_phong', $request->room_id)->orderBy('ten_thiet_bi', 'ASC')->get();
            return response()->json($devices);
        }
    }

    // function seachDevice(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $divices = Device::table('thiet_bi')->where('ten_thiet_bi', 'LIKE', '%' . $request->searchDevice . '%')->get();
    //         if ($divices) {
    //             foreach ($divices as $key => $divice) {
    //                 $output .= '<p>' .$divice->then_thiet_bi .'</p>';
    //             }
    //         }
    //         return Response($output);
    //     }
    // }
}
