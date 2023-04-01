<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Models\SchoolLesson;
use App\Models\SchoolClass;
use App\Models\SchoolClassroom;
use App\Models\SchoolSubject;
use App\Models\SchoolCard;
use Carbon\Carbon;

class SchoolLessonController extends Controller
{


    // public function getcardforclassroom(string $id) {
    //     // $user = SchoolLesson::find(1)->classes()->get();
    //     // dd($user);
    //     $class = SchoolCard::with('subjects', 'classrooms')->get();
    //     // $class = SchoolClassroom::with('lessons.subjects')->find(1);
    //     // $lessons = $class->lessons;
    //     // $lessons = $class->lessons;
    //     // $lessons->subjects;
    //     dd($class->first());
    //     // dd(SchoolClass::with('subjects')->get());
    //     // return Schoollesson::pluck("class_name");
    //     // foreach ($user->classes as $class) {
    //     //     dd($user);
    //     // }
    // }


    public function show(string $id){
         function checkDay(){
            $today = Carbon::today()->dayOfWeek;
            switch($today){
                case 1 :
                    return '10000';
                    break;
                case 2 :
                    return '01000';
                    break;
                case 3 :
                    return '00100';
                    break;
                case 4 :
                    return '00010';
                    break;
                case 5 :
                    return '00001';
                    break;
                default :
                    return '10000';
            }

        }
        $classroomId = SchoolClassroom::where('short_name', $id)->pluck('school_classroom_id');
        // $class = SchoolCard::with('subjects', 'classrooms')->where('school_classroom_id',$classroomId)->where('days', checkDay())->get();
        for ($i=0; $i < 12; $i++) {
            $formattedClass[$i] = SchoolCard::with('subjects', 'classrooms')->where('school_classroom_id',$classroomId)->where('days', checkDay())->where('period', $i)->get();
            $formattedClass[$i] = $formattedClass[$i]->map(function($items){
               return $formattedClass = $items->subjects->pluck('subject_name');
                //  $formattedClass->subject_name;
            });
        }
        return $formattedClass;
        // $class = $class->map(function($items){
        //     return $items->subjects;
        // });

        // dd($formattedClass);
    }

}

