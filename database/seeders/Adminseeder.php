<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Adminseeder extends Seeder
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
            [
                'name' => 'anuj',
                'email' => 'anuj@gmail.com',
                'password' => Hash::make('anuj@123'),
            ]
        ];
        DB::table('admins')->insert($admins);
    }
}
