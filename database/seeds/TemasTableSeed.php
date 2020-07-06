<?php

use Illuminate\Database\Seeder;

class TemasTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Tema', 10)->create()->each(function($t){
            $t->items()->save(factory('App\Item')->make());
        });
    }
}
