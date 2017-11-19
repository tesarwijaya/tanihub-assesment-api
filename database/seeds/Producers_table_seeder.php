<?php

use Illuminate\Database\Seeder;

class Producers_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Producer::class, 20)->create()->each(function ($producer) {
            $producer->products()->save(factory(App\Product::class)->make());
        });
        /**
         * create factory with funded status
         */
        factory(App\Producer::class, 2)->create()->each(function ($producer) {
            $producer->products()->save(factory(App\Product::class)->make([
                'value' => '250000000',
                'fund' => '250000000']));
        });
    }
}
