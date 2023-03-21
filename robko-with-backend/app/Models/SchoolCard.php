<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCard extends Model
{
    use HasFactory;
    protected $fillable =[
      'lesson_id',
      'classroom_id',
      'period',
      'weeks',
      'days'
    ];
}
