<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shape;

class ShapesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of sample shapes data
        $shapes = [
            [
                'name' => 'Sathya',
                'shape_name' => 'square',
                'colour' => 'red',
            ],
            [
                'name' => 'Daren',
                'shape_name' => 'circle',
                'colour' => 'blue',
            ],
            [
                'name' => 'Ronaldo',
                'shape_name' => 'triangle',
                'colour' => 'purple',
            ],

        ];

        // Loop through the shapes array and insert each shape into the shapes table
        foreach ($shapes as $shapeData) {
            Shape::create($shapeData);
        }
    }
}
