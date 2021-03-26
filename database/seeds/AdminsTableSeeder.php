<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

       		'username' => 'haykamu',
            'email' => 'kamu@gmail.com',
			'password' => Hash::make('123456789'),          
            
        ]);
    }
}

