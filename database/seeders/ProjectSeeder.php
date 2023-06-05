<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->word();
            $project->description = $faker->sentence(3);
            $project->status = 'pending';
            $project->duration =  $faker->randomDigit();
            $project->start_date = $faker->date();
            $project->end_date = $faker->date();
            $project->save();
        }
    }
}
