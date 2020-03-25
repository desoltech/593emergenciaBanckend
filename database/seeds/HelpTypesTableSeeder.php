<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('help_types')->insert([
            'name' => 'Alimento',
        ]);

        DB::table('help_types')->insert([
            'name' => 'Mascarillas',
        ]);
    }
}
