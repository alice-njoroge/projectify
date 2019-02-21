<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\User;
class ProjectsController extends Controller
{
    /**
     * List user projects with counts of all tasks, un complete and complete tasks
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        return view('pages.projects.index', [
            'user' => $user,
            'projects' => $projects
        ]);
    }

    /**
     * Show form to assign a project
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('pages.projects.create', [
            'user' => $user
        ]);
    }

    /**
     *Assign project to the user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'user_id'
        ]);

       $project = new  Project([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
       $user->projects()->save($project);

       return redirect()->back()->with('success', 'Project Added Successfully');
    }
}
