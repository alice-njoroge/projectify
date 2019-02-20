<?php

use App\Project;
use App\User;
use Illuminate\Database\Seeder;

class ProjectsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 100)->make()->each(function ($project) {
            $users = User::all();
            $user = $users->random();
            $user->projects()->save($project);
        });
    }
}
