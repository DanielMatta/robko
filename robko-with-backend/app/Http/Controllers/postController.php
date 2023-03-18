<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Http\Actions\GetSchoolClassesFromApi;
use App\Http\Actions\GetSchoolClassroomsFromApi;
use App\Models\SchoolClass;
use App\Models\SchoolClassroom;
use App\Models\SchoolPeriod;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function store(){
        // dd(SchoolClassroom::get());
        // return response()->json(SchoolClassroom::all());
        // dd(app(GetSchoolClassesFromApi::class)->handle());

        $api_key = config("spsekeapi.api_key");
        $base_url_api = config("spsekeapi.base_url_api");
        $api_url ="{$base_url_api}?apikey={$api_key}&cmd=gettimetable&timetableid=98&format=asctt2012.xml";
        $response = Http::get($api_url);
        $xml_object = simplexml_load_string($response);
        $json_format_data = json_encode($xml_object);
        $data =  json_decode($json_format_data);
        $collection = collect($data);
        $class = collect($collection->get("periods"));
        $classes = collect($class->get("period"));
        $class_name = $classes->pluck("@attributes.name");
        $start_time = $classes->pluck("@attributes.starttime");
        // $start_time
        // dd($start_time);
        // $class_id = $classes->pluck("@attributes.id");
        // $class_id_teacher = $classes->pluck("@attributes.teacherid");
        return $classes->map(function($class) {
            $formattedClass['subject_name'] = $class->{"@attributes"}->name;
            $formattedClass['api_id'] = $class->{"@attributes"}->id;
            $formattedClass['start_time'] = $class->{"@attributes"}->starttime;
            $formattedClass['end_time'] = $class->{"@attributes"}->endtime;
            return $formattedClass;
        });

        /*
        $api_key = config("spsekeapi.api_key");
        $base_url_api = config("spsekeapi.base_url_api");
        $api_url ="{$base_url_api}?apikey={$api_key}&cmd=gettimetable&timetableid=98&format=asctt2012.xml";
        $response = Http::get($api_url);
        $xml_object = simplexml_load_string($response);
        $json_format_data = json_encode($xml_object);
        $data =  json_decode($json_format_data);
        $collection = collect($data);
        $class = collect($collection->get("classes"));
        $classes = collect($class->get("class"));
        // $class1 = collect($classes ->get("0"));
        // dd($classes);
        // dd($classes);
        // dd($classes->map(fn($class) => $class->{"@attributes"})->pluck("name"));
        dd($classes->pluck("@attributes.name"));
        // $class1 ->each(function($item, $key){
        //    $class = collect($item);
        //    echo $class->only('name');
        //    dd($class);
        // });
        // foreach($classes as $trieda) {
        //     echo $trieda->get('name');
        // }
        // dd($collection->get("classes"));
        // dd($collection);
        // echo"<pre>";
        // foreach($data as $post ){
        //     $post = collect($post);
        //     print_r($post);
        // }

        // print_r($data);
        */

        die;
    }
}
