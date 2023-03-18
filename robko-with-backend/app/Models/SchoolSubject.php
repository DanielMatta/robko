<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSubject extends Model
{
    use HasFactory;
    protected $fillable =[
        'period_name',
        'start_time',
        'end_time',
        'api_id'
    ];
}
