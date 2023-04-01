<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClassroom extends Model
{
    use HasFactory;
    protected $fillable =[
        'classroom_name',
        "short_name",
        // "teaher_admin"
        'school_classroom_id',
        'floor'
        // 'api_id_teacher'
    ];

    public function lessons()
    {
        return $this->belongsToMany(SchoolLesson::class, 'school_cards', 'school_classroom_id', 'school_lesson_id', 'school_classroom_id', 'school_lesson_id');
    }
}
