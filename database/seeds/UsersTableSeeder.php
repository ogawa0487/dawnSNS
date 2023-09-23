<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => '秋山直輝',
                'mail' => 'n.aki@bic.com',
                'password' => Hash::make('akiaki'),
                'created_at' => '2020-3-17 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
            [
                'username' => '石崎かのん',
                'mail' => 'k.zaki@bic.com',
                'password' => Hash::make('kankan'),
                'created_at' => '2019-3-01 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
            [
                'username' => '綱文香',
                'mail' => 'tunasy@bic.com',
                'password' => Hash::make('lovebicsim'),
                'created_at' => '2020-3-01 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
            [
                'username' => '熱川みちこ',
                'mail' => 'nitebon@bic.com',
                'password' => Hash::make('sbsb222'),
                'created_at' => '2019-3-01 10:10:10',
                'updated_at' => '2022-3-15 11:12:02',
            ],
        ]);
    }
}
