<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buyers')->truncate();

        $buyers = [
            ['email' => 'buyer@gmail.com', 'password' => Hash::make('buyer@123')],
        ];

        DB::table('buyers')->insert($buyers);
    }
}
