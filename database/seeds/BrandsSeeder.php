<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
                    ['name' => 'Nike'],
                    ['name' => 'Adidas'],
                    ['name' => 'Puma'],
                    ['name' => 'Jordan'],
                    ['name' => 'Vans'],
                    ['name' => 'Converse'],
                    ['name' => 'Under Armour'],
                    ['name' => 'New Balance'],
					['name' => 'Johnston and Murphy'],
					['name' => 'Bostonian'],
					['name' => 'Fila'],
					['name' => 'LeBron'],
					['name' => 'Testoni'],
					['name' => 'Berluti'],
					['name' => 'ASICS'],
					['name' => 'Tommy Hilfiger'],
					['name' => 'Other']
                ]);
    }
}

					
