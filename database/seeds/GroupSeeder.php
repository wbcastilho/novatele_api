<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::firstOrCreate([
            'name' =>'Root',            
        ]);

        Group::firstOrCreate([
            'name' =>'Administrador',            
        ]);

        Group::firstOrCreate([
            'name' =>'Operador',            
        ]);
    }
}
