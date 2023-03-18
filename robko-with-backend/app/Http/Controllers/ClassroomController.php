<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClassroom;
use Illuminate\View\View;

class ClassroomController extends Controller
{


    public static function getClassroomShortName() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("short_name");
    }
    public static function getClassroomName() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("name");
    }
    public static function getClassroomId() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("id");
    }
}
