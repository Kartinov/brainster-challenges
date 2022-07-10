<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'desc')->get();

        return view('pages.home', compact('projects'));
    }
}
