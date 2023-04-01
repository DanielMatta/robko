<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SchoolLesson extends Model
{
    use HasFactory;
    protected $fillable =[
        'school_lesson_id',
        'school_class_id',
        'school_subject_id'
    ];
        /**
     * The classes that belong to the lesson.
    //  */
    // public function classes()
    // {
    //     return $this->belongsToMany(SchoolClass::class, 'school_lessons' , 'school_class_id');
    // }

    // /**
    //  * The subjects that belong to the lesson.
    //  */
    // public function subjects()
    // {
    //     return $this->belongsToMany(SchoolSubject::class, 'school_lessons', 'school_subject_id');
    // }
    public function classrooms()
    {
        return $this->belongsToMany(SchoolClassroom::class, 'school_cards', 'school_lesson_id', 'school_classroom_id', 'school_lesson_id', 'school_classroom_id');
    }
    public function subjects()
    {
        return $this->belongsToMany(SchoolSubject::class, 'school_lessons', 'school_lesson_id', 'school_subject_id', 'school_lesson_id', 'school_subject_id');
    }


}
