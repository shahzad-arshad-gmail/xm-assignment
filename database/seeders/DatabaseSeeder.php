<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $symbols = array();
        $companyData = json_decode(file_get_contents('https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json'));
        foreach ($companyData as $data) {
            if (!in_array($data->Symbol, $symbols)) {
                $symbols[] = $data->Symbol;
            }

        }

        foreach ($symbols as $row) {
            DB::table('symbols')->insert([
                'value' => $row
            ]);
        }

    }
}
