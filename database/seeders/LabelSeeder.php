<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            ['name' => 'bug', 'color' => 'grey'],
            ['name' => 'feature', 'color' => 'green'],
            ['name' => 'urgent', 'color' => 'red'],
        ]);
    }
}
