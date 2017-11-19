<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Oauth_clients_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id' => 999,
            'name' => 'Vue Client Apps',
            'secret' => 'tL9Ul2APRTXKd5G3dLyvZO0W61PKGHRC5eygJqQx',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0
        ]);
    }
}
