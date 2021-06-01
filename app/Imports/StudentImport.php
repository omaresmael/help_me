<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Student([
                'id'=>$row[0],
                'name'=>$row[1],
                'national_number'=>$row[2],
                'dateOfBirth'=>$row[3],
                'gender'=>$row[4],
                'guardian_name'=> $row[5],
                'guardian_national_number'=> $row[6],
                'email'=> $row[7],
                'disability_type'=> $row[8],
                'disability_power'=> $row[9],
                'report_type'=> $row[10],
                'section'=> $row[11],
                'attendance_begin'=> $row[12],
                'attendance_end'=> $row[13],
                'date_send'=> $row[14],
                'ministry_nomination'=> $row[15],
                'school_nomination'=> $row[16],
                'program_school_id'=> $row[17],
                'created_at'=> $row[18],
                'updated_at'=> $row[19],
            ]);
    }
}
