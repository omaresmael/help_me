<?php

namespace App\Imports;

use App\Models\Sitting;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class SittingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Sitting([
                'id'=>$row[0],
                'name'=>$row[1],
                'teacher_id'=>$row[2],
                'student_id'=>$row[5],
                'start_at'=>$row[7],
                'end_at'=>$row[8],
                'price'=>$row[9],
                'created_at'=> $row[10],
                'updated_at'=> $row[11],
            ]);
    }
}
