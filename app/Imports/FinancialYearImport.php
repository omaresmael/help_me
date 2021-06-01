<?php

namespace App\Imports;

use App\Models\FinancialYear;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class FinancialYearImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
        return new FinancialYear([
            'id'=>$row[0],
            'year'=>$row[1],
            'status'=>$row[2],
            'start_at'=>$row[3],
            'end_at'=>$row[4],
            'created_at'=> $row[5],
            'updated_at'=> $row[6],
        ]);
    }
}
