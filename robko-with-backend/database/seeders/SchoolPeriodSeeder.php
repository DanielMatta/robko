<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Actions\GetPeriodsFromApi;
use App\Models\SchoolPeriod;

class SchoolPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolPeriod::upsert(
            app(GetPeriodsFromApi::class)->handle()->toArray(),
            ["name"]
        );
    }
}
