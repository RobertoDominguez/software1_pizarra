<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Roberto Dominguez',
                'email'=>'roberto@gmail.com',
                'password'=>Hash::make('123123123'),
            ],
            [
                'name'=>'Juan Montero',
                'email'=>'juan@gmail.com',
                'password'=>Hash::make('123123123'),
            ],
            [
                'name'=>'Erick Patton',
                'email'=>'erick@gmail.com',
                'password'=>Hash::make('123123123'),
            ],
            [
                'name'=>'Jose Wayne',
                'email'=>'jose@gmail.com',
                'password'=>Hash::make('123123123'),
            ]
        ]);
    }
}
