<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['front-end', 'back-end', 'full-stack'];

        foreach($types as $type) {
            $newType = new Type();
            $newType->type_name = $type;
            $newType->slug = Str::slug($newType->type_name);
            $newType->save();
        }
    }
}
