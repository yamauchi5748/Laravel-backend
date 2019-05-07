<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UserMoneyTableSeeder::class);
        $this->call(TimecapsuleTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(UserFollowTableSeeder::class);
        $this->call(UserTimecapsulegoodTableSeeder::class);
        $this->call(TimecapsuleFileTableSeeder::class);
    }
}
