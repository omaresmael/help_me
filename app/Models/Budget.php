<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Budget extends Model
{
    protected $guarded = [];
    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class);
    }
}
