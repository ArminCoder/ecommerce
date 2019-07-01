<?php

use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
        	['name' => '50$ and Under', 'value' => '50'],
        	['name' => '100$ and Under', 'value' => '100'],
        	['name' => '150$ and Under', 'value' => '150'],
        	['name' => '200$ and Under', 'value' => '200'],
        	['name' => '200$ and Over', 'value' => '201'],
        ]);
    }
}





					
				