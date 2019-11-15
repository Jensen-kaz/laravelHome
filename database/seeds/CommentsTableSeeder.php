<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        for ($i = 1; $i < 11; $i++) {
            DB::table('comments')->insert([
                'text' => 'Текст '. $i . '',
                'article_id' =>  $i,
                'user_id' => rand(5, 14),
            ]);
        }
    }
}
