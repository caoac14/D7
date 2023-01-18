<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReport;
use App\Exports\ExportRoom;
use App\Exports\ExportDevice;
use App\Exports\ExportAccount;
use Illuminate\Http\Request;

class ExportExcel extends Controller
{
    public function exportReport(Request $request)
    {
        switch ($request->rdo_excel) {
            case ('rdo_report'):
                return Excel::download(new ExportReport, 'so nhat ky.xlsx');
                break;
            case ('rdo_account'):
                return Excel::download(new ExportAccount, 'danh sach tai khoan.xlsx');

                break;

            case ('rdo_device'):
                return Excel::download(new ExportDevice, 'danh sach thiet bi.xlsx');

                break;

            case ('rdo_room'):
                return Excel::download(new ExportRoom, 'danh sach phong.xlsx');
                break;

            default:
                return Excel::download(new ExportReport, 'so nhat ky.xlsx');
        }
    }
}
