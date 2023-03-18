<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Http\Actions\GetSchoolClassesFromApi;
use App\Http\Actions\GetSchoolClassroomsFromApi;
use App\Models\SchoolClass;
use App\Models\SchoolPeriod;


class SchoolPeriodController extends Controller
{


    public static function getPeriodName() {
        return SchoolPeriod::pluck("period_name");
    }
}

