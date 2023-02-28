<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newProject = new Project();

            $newProject->title = $faker->unique()->realTextBetween(10, 30);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->description = $faker->unique()->realTextBetween(400, 1200);
            $newProject->creation_date = $faker->dateTimeBetween('-4 week');
            $newProject->image = $faker->imageUrl(640, 480, 'animals', true);
            $newProject->save();
        }
    }
}
