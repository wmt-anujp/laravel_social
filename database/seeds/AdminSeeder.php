<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'ABC',
                'email' => 'abc@gmail.com',
                'password' => Hash::make('abc@1234'),
            ],
            [
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('test@1234'),
            ]
        ];


        collect($admins)->each(function ($q) {
            Admin::create(['email' => $q['email'], $q]);
        });
    }
}
