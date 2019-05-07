<?php

use Illuminate\Database\Seeder;

class UserFollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_follows')->insert([
            'user_id' => 1,
            'following_user_id' => 2
        ]);

        DB::table('user_follows')->insert([
            'user_id' => 2,
            'following_user_id' => 1
        ]);
    }
}
