<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_time = Carbon::now();
        
         DB::table('schools')->insert([
            'name' =>'EST',
            'description' => 'IPCB',
             'created_at'=> $current_time,
        ]);
    }
}
