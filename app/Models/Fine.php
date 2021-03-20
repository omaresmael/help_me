<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected static function boot()
    {
        parent::boot();

        Fine::creating(function($model) {
            $model->issuer_name = auth()->user()->name;
        });
    }
    protected $fillable = ['amount','issuer_name','reason','school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function getCurrentPeriod()
    {
        $period = Period::whereHas('absence', function (Builder $query) {
            $query->where('start_at', '<=', Carbon::now()->toDateString())->where('end_at', '>', Carbon::now()->toDateString());
        })->first();
        return $period;
    }
    //that fetches the period that the fine was assigned in its duration
    public function scopePeriod($query,Period $period)
    {
        return $query->where('created_at', '>',$period->start_at)
            ->where('created_at','<',$period->end_at);
    }

}
