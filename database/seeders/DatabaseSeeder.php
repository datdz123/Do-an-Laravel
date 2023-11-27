<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('admin')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '0981607062',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
