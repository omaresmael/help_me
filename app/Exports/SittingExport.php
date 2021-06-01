<?php

namespace App\Exports;

use App\Models\School;
use App\Models\Sitting;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SittingExport implements FromCollection ,WithHeadings,WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sitting::with(['teacher'=>function($q){
            $q->with(['school'=>function($z){
                $z->select('id','name');
            }])->select('id','name','school_id');
        }])->get();
    }

    public function map($sitting): array
    {
        return [
            $sitting->id,
            $sitting->name,
            $sitting->teacher_id,
            $sitting->teacher->name,
            $sitting->teacher->school->name,
            $sitting->student_id,
            $sitting->student->name,
            $sitting->start_at,
            $sitting->end_at,
            $sitting->price,
            $sitting->created_at,
            $sitting->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'teacher_id',
            'teacher_name',
            'school_name',
            'student_id',
            'student_name',
            'start_at',
            'end_at',
            'price',
            'created_at',
            'updated_at',
        ];
    }

}
