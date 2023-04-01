<?php
namespace App\Http\Actions;
// use Illuminate\Http\Request;
// use App\Models\Post;
use Illuminate\Support\Facades\Http;
class GetSchoolClassesFromApi{


    public function handle(){
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
        $class_name = $classes->pluck("@attributes.name");
        // $class_id = $classes->pluck("@attributes.id");
        // $class_id_teacher = $classes->pluck("@attributes.teacherid");
        return $classes->map(function($class) {
            $formattedClass['class_name'] = $class->{"@attributes"}->name;
            $formattedClass['school_class_id'] = $class->{"@attributes"}->id;
            $formattedClass['api_id_teacher'] = $class->{"@attributes"}->teacherid;
            return $formattedClass;
        });
    }

}
