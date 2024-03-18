<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();

        return view('site.pages.projects.index' ,compact('project'));
    }
}
