<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'speciality',
            'qualification',
            'national_number',
            'entity_acceptance_number',
            'entity_acceptance_date',
            'birth_day',
            'nationality',
            'job',
            'school_id',
            'created_at',
            'updated_at',
        ];
    }
}
