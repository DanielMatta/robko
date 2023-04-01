<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SchoolSubject extends Model
{
    use HasFactory;
    protected $fillable =[
        'period_name',
        'start_time',
        'end_time',
        'school_subject_id'
    ];
    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'school_lessons' , 'school_subject_id',  'school_class_id', 'school_subject_id', 'school_class_id');
    }

}
