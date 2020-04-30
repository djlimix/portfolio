<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function getProjects() {
        return Project::latest()->get(['slug', 'title', 'year', 'type'])->toJson();
    }

    public function getProject( $slug ) {
        $project = Project::whereSlug($slug)->with('images')->first();
        if (!empty($project)) {
            return $project->toJson();
        }

        return json_encode('');
    }
}
