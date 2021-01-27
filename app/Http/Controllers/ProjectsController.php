<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function getProjects() {
        return response()->json(Project::latest()->get(['slug', 'title', 'year', 'type']));
    }

    public function getProject( $slug ) {
        $project = Project::whereSlug($slug)->with('images')->first();
        if (!empty($project)) {
            return response()->json($project);
        }

        return json_encode('');
    }
}
