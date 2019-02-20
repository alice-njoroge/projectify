<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProjectsController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('pages.projects', [
            'user' => $user
        ]);
    }
}
