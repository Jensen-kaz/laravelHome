<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
          DB::table('users')->insert([
                'name' => 'Пользователь '. $i . '',
                'email' => 'user' . $i . '@mail.com',
                'password' => 'qwerty',
            ]);
        }
    }
}
