<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class projectController extends Controller
{
    public function index()
    {
        #$projects = DB::select('select * from projects where id = 2');
        $projects = \App\Project::all();
        return view('projects.index', ['projects' => $projects]);
    }
}

