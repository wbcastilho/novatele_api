<?php

use Illuminate\Database\Seeder;
use App\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::firstOrCreate([
            'name' =>'',            
        ]);
    }
}
