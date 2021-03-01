<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymbolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('symbols')->insert([
            [
                'id'=>'1',
                'type'=>'1',
                'name'=>'begin'
            ],
            [
                'id'=>'2',
                'type'=>'2',
                'name'=>'end'
            ],
            [
                'id'=>'3',
                'type'=>'3',
                'name'=>'comentary'
            ],
            [
                'id'=>'4',
                'type'=>'4',
                'name'=>'output'
            ],
            [
                'id'=>'5',
                'type'=>'5',
                'name'=>'input'
            ],
            [
                'id'=>'6',
                'type'=>'6',
                'name'=>'if'
            ],
            [
                'id'=>'7',
                'type'=>'7',
                'name'=>'endif'
            ],
            [
                'id'=>'8',
                'type'=>'8',
                'name'=>'while'
            ],
            [
                'id'=>'9',
                'type'=>'9',
                'name'=>'endwhile'
            ],
            [
                'id'=>'10',
                'type'=>'10',
                'name'=>'action'
            ],
        ]);
    }
}
