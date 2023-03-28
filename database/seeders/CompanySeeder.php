<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'title' => 'First company',
            'phone' => '0956894315',
            'description' => 'First company',
            'user_id' => 1
        ]);
        DB::table('companies')->insert([
            'title' => 'Second company',
            'phone' => '0956894315',
            'description' => 'Second company',
            'user_id' => 1
        ]);
        DB::table('companies')->insert([
            'title' => 'Third company',
            'phone' => '0956894315',
            'description' => 'Third company',
            'user_id' => 1
        ]);
        DB::table('companies')->insert([
            'title' => 'Best company',
            'phone' => '0956894312',
            'description' => 'Best company',
            'user_id' => 2
        ]);
    }
}
