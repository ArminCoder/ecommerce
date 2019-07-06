<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    	            'name' => 'Admin',
    	            'email' => 'arminbalija.dev@gmail.com',
    	            'password' => bcrypt('bF1ghMml4oa6g#h!g'),
                    'profileImage' => '/img/adminImage23523523.png',                    
                    'isAdmin' => 1
    	        ]);
    }
}
