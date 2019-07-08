<?php

use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        	 [ 'name'=> 'Running'],
			 [ 'name'=> 'Athletic'],
			 [ 'name'=> 'Gym'],
			 [ 'name'=> 'Formal'],
			 [ 'name'=> 'Slip-on'],
			 [ 'name'=> 'High-Top'],
			 [ 'name'=> 'Lace-up']
        ]);
   }
}   
					