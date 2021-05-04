<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Period extends Model
{




protected $fillable = ['start_at','end_at','financial_ratio','name','financial_year_id'];
protected $with = ['financialYear'];

    protected static function boot()
    {
        parent::boot();

        Period::creating(function($model) {
            $model->attendance_days = 200; // that will be changed after figuring out the function for it
        });
    }

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function absence()
    {
        return $this->belongsToMany(Student::class,'absence')->withPivot('absence_days');
    }

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }
}
