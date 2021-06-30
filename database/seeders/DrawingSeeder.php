<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrawingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'storage/app/drawings.json';
        $drawings = json_decode(file_get_contents($path), true);
        foreach ($drawings as $drawing) {
            DB::table('drawings')->insert([
                'id' => $drawing['id'],
                'image' => $drawing['image'],
                'score' => random_int(-500, 1000),
                'isFinished' => $drawing['isFinished'],
                'created_at' => $drawing['created_at'],
                'updated_at' => $drawing['updated_at'],
            ]);
        }
    }
}
