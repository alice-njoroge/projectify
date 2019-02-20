<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProjectsController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        $projects = $user->projects()->withCount([
            'tasks',
            'tasks as completed_tasks_count' => function ($query) {
            $query->where('completed', true);
            },
            'tasks as un_complete_tasks_count' => function ($query) {
                $query->where('completed', false);
            }])->get();
        return view('pages.projects', [
            'user' => $user,
            'projects' => $projects
        ]);
    }
}
