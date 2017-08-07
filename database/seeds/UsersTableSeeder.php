<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_time = Carbon::now();
        
         DB::table('users')->insert([
            'name' =>' Paul Valdez',
            'email' => 'admin@yahoo.co.uk',
            'password' => bcrypt('123456'),
             'created_at'=> $current_time,
        ]);
    }
}
