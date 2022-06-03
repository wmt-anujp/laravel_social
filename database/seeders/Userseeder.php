<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'name' => "umang",
                'email' => 'umang@gmail.com',
                'password' => Hash::make('umang@123'),
            ],
            [
                'name' => "tushar",
                'email' => 'tushar@gmail.com',
                'password' => Hash::make('tushar@123'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
