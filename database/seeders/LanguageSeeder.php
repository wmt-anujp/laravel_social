<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->truncate();

        $lang = [
            ['language' => 'English', 'lang_code' => 'en'],
            ['language' => 'Hindi', 'lang_code' => 'hi'],
        ];
        DB::table('languages')->insert($lang);
    }
}
