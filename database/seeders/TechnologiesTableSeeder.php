<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $techArray = ['CSS', 'JS', 'TypeScript', 'PHP', 'C++', 'Java'];
            foreach($techArray as $name){
                $newTechnology = new Technology();
                $newTechnology->name = $name;
                $newTechnology->description = Str::random(10);
                $newTechnology->save();
            }

    }
}
