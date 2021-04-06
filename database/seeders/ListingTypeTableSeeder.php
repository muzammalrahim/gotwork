<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class ListingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();

    	$data[0] = ['title' => 'Featured','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[1] = ['title' => 'Sealed','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[2] = ['title' => 'NDA','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[3] = ['title' => 'Urgent','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[4] = ['title' => 'Fulltime','status' => 'Active', 'created_at' => now(),'updated_at' => now()];
    	$data[5] = ['title' => 'Recruiter','status' => 'Active', 'created_at' => now(),'updated_at' => now()];

        DB::table('listing_types')->insert($data);
    }
}
