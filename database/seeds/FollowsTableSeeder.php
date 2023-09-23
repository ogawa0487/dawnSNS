<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('follows')->insert([
            [
                'follow' => 2,
                'follower' => 1,
                'created_at' => '2020-3-17 10:10:10',
            ],
            [
                'follow' => 3,
                'follower' => 1,
                'created_at' => '2020-3-17 10:10:10',
            ],
            [
                'follow' => 1,
                'follower' => 2,
                'created_at' => '2020-3-17 10:10:10',
            ],
            [
                'follow' => 3,
                'follower' => 2,
                'created_at' => '2020-3-17 10:10:10',
            ],
        ]);
    }
}
