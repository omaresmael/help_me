<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    protected $guarded = [];
    public function periods()
    {
        return $this->hasMany(Period::class,'financial_year_id');
    }
    public function budgets()
    {
        return $this->hasMany(budget::class,'financial_year_id');
    }
}
