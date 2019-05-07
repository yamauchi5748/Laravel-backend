<?php

use Illuminate\Database\Seeder;

class TimecapsuleFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++){

            DB::table('timecapsule_files')->insert([
                'timecapsule_id' => $i,
                'file_path' => 'user' . $i,
                'order_number' => 1
            ]);
                
            DB::table('timecapsule_files')->insert([
                'timecapsule_id' => $i,
                'file_path' => 'user' . $i,
                'order_number' => 2
            ]);

            DB::table('timecapsule_files')->insert([
                'timecapsule_id' => $i,
                'file_path' => 'user' . $i,
                'order_number' => 3
            ]);

            DB::table('timecapsule_files')->insert([
                'timecapsule_id' => $i,
                'file_path' => 'user' . $i,
                'order_number' => 4
            ]);

            DB::table('timecapsule_files')->insert([
                'timecapsule_id' => $i,
                'file_path' => 'user' . $i,
                'order_number' => 5
            ]);
        }
    }
}
