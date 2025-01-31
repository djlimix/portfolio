<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller {
    public function index() {
        $projects = Project::all();

        return view('admin.projects.show', compact('projects'));
    }

    public function create() {
        return view('admin.projects.add');
    }

    public function store(StoreProjectRequest $request): RedirectResponse {
        $project = Project::create($request->validated());

        return redirect()->route('admin.projects.edit', $project);
    }

    public function edit(Project $project) {
        return view('admin.projects.add', compact('project'));
    }

    public function update(Project $project, StoreProjectRequest $request): RedirectResponse {
        $project->update($request->validated());

        return redirect()->back();
    }

    public function destroy(Project $project): RedirectResponse {
        Storage::deleteDirectory('/projects/'.$project->slug);
        $project->delete();

        return redirect()->route('admin.projects');
    }
}
