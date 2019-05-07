<?php

use Illuminate\Database\Seeder;

class UserMoneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('user_moneys')->insert([
                'user_id' => $i,
                'money' => 1000
            ]);
        }
    }
}
