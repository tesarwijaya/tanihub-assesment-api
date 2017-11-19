<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Users_table_seeder::class);
        $this->call(Producers_table_seeder::class);
        $this->call(Oauth_clients_table_seeder::class);
    }
}
