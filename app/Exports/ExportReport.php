<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportReport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function collection()
    {
        $dataReport = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
            ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
            ->join('nhom_thiet_bi', 'nhom_thiet_bi.ma_nhat_ky', '=', 'nhat_ky.id')
            ->join('thiet_bi', 'thiet_bi.id', '=', 'nhom_thiet_bi.ma_thiet_bi')
            ->orderBy('nhat_ky.ngay', 'ASC')
            ->select(
                'nhat_ky.id',
                'name',
                'email',
                'ten_thiet_bi',
                'ten_phong',
                'ma_lop',
                'buoi',
                'ngay',
                'mo_ta_loi',
                'nhat_ky.created_at',
            )->get();
        return $dataReport;
    }

    public function headings(): array
    {
        return [
            '#', 'Họ tên', 'E-mail', 'Tên thiết bị', 'Tên phòng', 'Mã lớp', 'Buổi', 'Ngày', 'Mô tả lỗi', 'Thời gian tạo'
        ];
    }
}
