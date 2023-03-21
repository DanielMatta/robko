<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Http\Actions\GetLessonsFromApi;
// use App\Models\SchoolLesson;
use App\Http\Actions\GetClassroomsFromApi;
use App\Models\SchoolClassroom;

class SchoolClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SchoolLesson::upsert(
        //     app(GetLessonsFromApi::class)->handle()->toArray(),
        //     ["api_id"]
        // );
        SchoolClassroom::upsert(
            app(GetClassroomsFromApi::class)->handle()->toArray(),
            ["api_id"]
        );
    }
}
