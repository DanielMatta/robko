<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Actions\GetClassroomsFromApi;
use App\Models\SchoolClassroom;
use App\Http\Controllers\ClassroomController;

class SchoolClassroomFloorSeeder extends Seeder
{
    function checkClassroomFloor($id){
        return match(true){
            $id < 3 => 0,
            ($id < 12 && $id > 2) => 1,
            ($id < 20 && $id > 12) => 2,
            ($id < 28 && $id > 20) => 3,
            ($id < 34 && $id > 28) => 4,
            ($id < 56 && $id > 34) => -1
        };
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolClassroom::where('id', '<', 3)->update(['floor' => 0]);
        SchoolClassroom::where('id', '<', 12)->where('id', '>', 2)->update(['floor' => 1]);
        SchoolClassroom::where('id', '<', 20)->where('id', '>', 11)->update(['floor' => 2]);
        SchoolClassroom::where('id', '<', 28)->where('id', '>', 19)->update(['floor' => 3]);
        SchoolClassroom::where('id', '<', 34)->where('id', '>', 27)->update(['floor' => 4]);
        SchoolClassroom::where('id', '<', 56)->where('id', '>', 33)->update(['floor' => -1]);
        sleep(30);
    }
}
