<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Program extends Model
{

    protected $fillable = ['name'];

    public function schools()
    {
        return $this->belongsToMany(school::class)->withPivot('program_price','program_day_price','start_at','end_at','id');
    }

    public function studentsNumber()
    {
        $countStudents = 0;
        $schools = $this->schools;
        foreach($schools as $school)
        {
            $countStudents += Student::where('program_school_id',$school->pivot->id)->count();

        }
        return $countStudents;

    }
//$id = DB::table('program_school')->select('id')
//->where('program_id',$this->id)->get();
//return $id;
}
