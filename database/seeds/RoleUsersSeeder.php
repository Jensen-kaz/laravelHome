<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->truncate();


        DB::table('role_users')->insert([
            'user_id' => 14,
            'role_id' => 1,
        ]);
    }
}
