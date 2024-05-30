<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;
class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnhnolgies = [
            [
                'name' => 'html',
                'slug' => 'html',
            ],
            [
                'name' => 'css',
                'slug' => 'css',
            ],
            [
                'name' => 'js',
                'slug' => 'js',
            ],
            [
                'name' => 'php',
                'slug' => 'php',
            ]
            ];

        foreach($tecnhnolgies as $tecnhnolgy) {
            $newTechnology = new Technology();
            $newTechnology->name = $tecnhnolgy['name'];
            $newTechnology->slug = Str::slug($tecnhnolgy['name'], '-');
            $newTechnology->save();
        }
    }
}
