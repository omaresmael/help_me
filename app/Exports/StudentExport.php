<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'national_number',
            'date of birth',
            'gender',
            'guardian_number',
            'guardian_national_number',
            'email',
            'disability_type',
            'disability_power',
            'report_type',
            'section',
            'attendance_begin',
            'attendance_end',
            'date_send',
            'ministry_nomination',
            'school_nomination',
            'program_school_id',
            'created_at',
            'updated_at',
        ];
    }

}
