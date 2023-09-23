<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'posts' => '健康診断にいてのお知らせ',
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
             [
                'user_id' => 2,
                'posts' => '社内懇親会について',
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
             [
                'user_id' => 3,
                'posts' => '給与について',
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
            [
                'user_id' => 4,
                'posts' => '交通費精算について',
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
            [
                'user_id' => 4,
                'posts' => 'コンプライアンスチェックについて',
                'created_at' => '2019-3-17 10:10:10',
                'updated_at' => '2020-3-15 11:12:02',
            ],
            [
                'user_id' => 3,
                'posts' => '新入社員情報',
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
        ]);
    }
}
