<?php

namespace App\Imports;

use App\Models\Period;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class PeriodsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Period([
                'id'=>$row[0],
                'name'=>$row[1],
                'start_at'=>$row[2],
                'end_at'=>$row[3],
                'financial_ratio'=>$row[4],
                'attendance_days'=>$row[5],
                'financial_year_id'=>$row[6],
                'created_at'=> $row[7],
                'updated_at'=> $row[8],
            ]);
    }
}
