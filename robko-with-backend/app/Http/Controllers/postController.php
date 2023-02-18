<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Http\Actions\GetSchoolClassesFromApi;
use App\Models\SchoolClass;

class PostController extends Controller
{
    public function store(){
        dd(SchoolClass::get());

        // dd(app(GetSchoolClassesFromApi::class)->handle());




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
