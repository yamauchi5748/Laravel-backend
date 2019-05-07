<?php

use Illuminate\Database\Seeder;

class UserTimecapsulegoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            DB::table('user_timecapsule_goods')->insert([
                'timecapsule_id' => $i,
                'gooded_user_id' => 1
            ]);
        }
    }
}
