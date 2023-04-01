<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable =[
        'class_name',
        'school_class_id',
        'api_id_teacher'
    ];

    public function subjects()
    {
        return $this->belongsToMany(SchoolSubject::class, 'school_lessons', 'school_class_id', 'school_subject_id', 'school_class_id', 'school_subject_id');
    }
}
