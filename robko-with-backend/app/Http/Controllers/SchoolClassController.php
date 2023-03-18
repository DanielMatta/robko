<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Http\Actions\GetSchoolClassesFromApi;
use App\Http\Actions\GetSchoolClassroomsFromApi;
use App\Models\SchoolClass;
use App\Models\SchoolClassroom;


class SchoolClassController extends Controller
{


    public static function getClassName() {
        return SchoolClass::pluck("class_name");
    }
}

