<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClassroom;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class ClassroomController extends Controller
{

    // public static function insert(){
    //     SchoolClassroom::insert("classroom_name", "classroom_name")
    // }

    public static function getClassroomShortName() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("short_name");
        // dd(SchoolClassroom::with('lessons')->find(1));
    }
    public static function getClassroomName() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("name");
    }
    public static function getFloor(Request $request, string $id){
        // dd(SchoolClassroom::pluck("floor")->where("id", "=", $id));
        return SchoolClassroom::where("short_name", $id)->get("floor");
    }
    public static function test() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        // $api_key = config("spsekeapi.api_key");
        // $base_url_api = config("spsekeapi.base_url_api");
        // $api_url ="{$base_url_api}?apikey={$api_key}&cmd=gettimetable&timetableid=98&format=asctt2012.xml";
        // $response = Http::get($api_url);
        // $xml_object = simplexml_load_string($response);
        // dd($response);
    }
    public static function getClassroomId() {
        // return view('app',[
        //     'shortname' => SchoolClassroom::pluck("short_name")
        // ]);
        // dd(SchoolClassroom::pluck('short_name'));
        return SchoolClassroom::pluck("id");
    }
}
