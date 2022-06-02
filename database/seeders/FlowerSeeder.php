<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flowers')->insert(
            [
                'name' => 'Tulip',
                'price' => 5
            ]
        );

        DB::table('flowers')->insert(
            [
                'name' => 'Orchid',
                'price' => 10
            ]
        );

        DB::table('flowers')->insert(
            [
                'name' => 'Lily',
                'price' => 2
            ]
        );
    }
}
