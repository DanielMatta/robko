<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Actions\GetCardsFromApi;
use App\Models\SchoolCard;

class SchoolCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolCard::upsert(
            app(GetCardsFromApi::class)->handle()->toArray(),
            ["id"]
        );
    }
}
