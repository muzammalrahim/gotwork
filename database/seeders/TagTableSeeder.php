<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();

    	$data[0] = ['name' => 'HTML','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[1] = ['name' => 'CSS','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[2] = ['name' => 'JavaScript','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[3] = ['name' => 'JQuery','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[4] = ['name' => 'PHP','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[5] = ['name' => 'CakePHP','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[6] = ['name' => 'WordPress','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[7] = ['name' => 'Laravel','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[8] = ['name' => 'Codeigniter','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[9] = ['name' => 'Python','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[10] = ['name' => 'Reactjs','status' => 'Active', 'created_at' => now(),'updated_at' => now()];

        DB::table('tags')->insert($data);
    }
}
