<?php

use Illuminate\Database\Seeder;

class TimecapsuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        for ($i = 1; $i < 100; $i++){
            DB::table('timecapsules')->insert([
                'money' => 30,
                'age' => (1971 + ($i % 47))
            ]);
            
            DB::table('user_timecapsules')->insert([
                'timecapsule_id' => $i,
                'user_id' => ($i % 5) + 1
            ]);
        
        }

    }
}
