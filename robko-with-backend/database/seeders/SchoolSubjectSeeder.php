<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Actions\GetSubjectsFromApi;
use App\Models\SchoolSubject;

class SchoolSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolSubject::upsert(
            app(GetSubjectsFromApi::class)->handle()->toArray(),
            ["api_id"]
        );
    }
}
