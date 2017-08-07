<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $current_time = Carbon::now();
         DB::table('role_user')->insert([
            'user_id' =>1,
            'role_id' => 1,
            'created_at'=> $current_time
        ]);
         
         DB::table('role_user')->insert([
            'user_id' =>1,
            'role_id' => 2,
            'created_at'=> $current_time
        ]);
    }
}
