<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 1000)->make()->each(function ($task) {
            $projects = Project::all();
            $project = $projects->random();
            $project->tasks()->save($task);
        });
    }
}
