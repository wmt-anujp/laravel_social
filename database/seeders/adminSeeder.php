<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        $admins = [
            ['email' => 'admin@gmail.com', 'password' => Hash::make('admin@123')]
        ];

        DB::table('admins')->insert($admins);
    }
}
