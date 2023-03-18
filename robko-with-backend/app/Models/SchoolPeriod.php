<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolPeriod extends Model
{
    use HasFactory;
    protected $fillable =[
        'period_name',
        // 'api_id',
        'start_time',
        'end_time'
    ];
}
