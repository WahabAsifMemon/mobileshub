<?php

use Illuminate\Database\Seeder;

class VariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Variation::class, 50)->create();
        
    }
}
