<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Actions\GetSchoolClassesFromApi;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolClass::upsert(
            app(GetSchoolClassesFromApi::class)->handle()->toArray(),
            ["api_id","api_id_teacher"]
        );
    }
}
