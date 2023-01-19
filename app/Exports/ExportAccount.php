<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAccount implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataReport = User::select('id', 'name', 'chuc_vu', 'hoc_vi', 'sdt', 'email', 'created_at', 'updated_at')
        ->get();
        return $dataReport;
    }
}
