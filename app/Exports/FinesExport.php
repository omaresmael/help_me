<?php

namespace App\Exports;

use App\Fines;
use App\Models\Fine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinesExport implements FromCollection, WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fine::with('school')->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'issuer_name',
            'amount',
            'reason',
            'school_id',
            'school_name',
            'created_at',
            'updated_at',
        ];
    }

    public function map($fines): array
    {
        return [
            $fines->id,
            $fines->issuer_name,
            $fines->amount,
            $fines->reason,
            $fines->school_id,
            $fines->school->name,
            $fines->created_at,
            $fines->updated_at,
        ];
    }

}
