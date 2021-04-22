<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;\

use DB;

class MembershipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('memberships')->count() > 0) {
            return;
        }

        DB::table('memberships')->insert([
            ['type' =>'free' , 'total_bids' => '6'],
        ]);
    }
}
