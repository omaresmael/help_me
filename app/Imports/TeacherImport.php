<?php

namespace App\Imports;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Teacher([
                'id'=>$row[0],
                'name'=>$row[1],
                'speciality'=>$row[2],
                'qualification'=>$row[3],
                'national_number'=>$row[4],
                'entity_acceptance_number'=>$row[5],
                'entity_acceptance_date'=>$row[6],
                'birth_day'=>$row[7],
                'nationality'=>$row[8],
                'job'=>$row[9],
                'school_id'=>$row[10],
                'created_at'=> $row[11],
                'updated_at'=> $row[12],
            ]);
    }
}
