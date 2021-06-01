<?php

namespace App\Exports;

use App\Models\Period;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeriodsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Period::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'start_at',
            'end_at',
            'financial_ratio',
            'attendance_days',
            'financial_year_id',
            'created_at',
            'updated_at',
        ];
    }

}
