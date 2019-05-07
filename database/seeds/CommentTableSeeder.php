<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++){
            DB::table('comments')->insert([
                'timecapsule_id' => $i,
                'posted_user_id' => (($i+1) % 5) + 1,
                'target_user_id' => ($i % 5) + 1,
                'comment_text' => "いい思い出ですね！"
            ]);

            DB::table('comments')->insert([
                'timecapsule_id' => $i,
                'posted_user_id' => ($i % 5) + 1,
                'target_user_id' => (($i+1) % 5) + 1,
                'comment_text' => "ありがとうございます！"
            ]);
        }
    }
}
