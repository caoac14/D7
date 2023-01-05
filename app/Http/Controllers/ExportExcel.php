<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportFile;
use Illuminate\Http\Request;

class ExportExcel extends Controller
{
    public function exportReport() 
    {
        return Excel::download(new ExportFile, 'so nhat ky.xlsx');
        // return view('admin.chart');
    }
}
