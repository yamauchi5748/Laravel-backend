<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['user1','user2','user3','user4','user5'];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user,
                'email' => 'example@gmail.com',
                'password' => bcrypt('secret'),
                'icon_path' => 'default',
                'hash_id' => '2',
                'token' => 'abc',
                'gender' => true,
                'born_at' => '1997-01-01'
            ]);
        }
    }
}
