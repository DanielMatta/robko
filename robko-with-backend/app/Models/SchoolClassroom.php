<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClassroom extends Model
{
    use HasFactory;
    protected $fillable =[
        'classroom_name',
        "short_name",
        // "teaher_admin"
        'api_id',
        'floor'
        // 'api_id_teacher'
    ];
}
