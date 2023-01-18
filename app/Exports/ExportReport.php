<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataReport = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
        ->join('lop', 'lop.id', '=', 'nhat_ky.ma_lop')
        ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
        ->orderBy('nhat_ky.created_at', 'DESC')
        ->select(
            'name',
            'email',
            'ten_phong',
            'ten_lop',
            'buoi',
            'ngay',
            'mo_ta_loi',
        )->get();
        return $dataReport;
    }
}
