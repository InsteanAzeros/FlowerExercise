<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(
            [
                'comment' => 'Such a beautiful tulip',
                'flower_id' => 1
            ]
        );

        DB::table('comments')->insert(
            [
                'comment' => 'Jane is dying, help us.',
                'flower_id' => 2
            ]
        );
    }
}
