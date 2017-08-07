<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_time = Carbon::now();
        
         DB::table('roles')->insert([
            'name' =>'Administrator',
            'description' => 'Administrator Role',
             'created_at'=> $current_time,
        ]);
         
         DB::table('roles')->insert([
            'name' =>'Member',
            'description' => 'Member Role',
             'created_at'=> $current_time,
        ]);
    }
}
