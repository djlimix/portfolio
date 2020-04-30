<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Project extends Model
{
    public function images() {
        return $this->hasMany(ProjectImage::class);
    }

    public function getPublishedAttribute() {
        return date('d. m. Y, G:i:s', strtotime($this->created_at));
    }

    public function add( Request $request ) {
        $project = new Project();

        $project->slug = Str::slug($request->title);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->type = $request->type;
        $project->won = ($request->won != '----' ? $request->won : null);
        $project->link = $request->link;
        $project->year = $request->year;

        $project->save();

        $i = 1;
        foreach ( $request->images as $image ) {
            $name = '/projects/' . $project->slug . '/' . $i . '.' . $image->clientExtension();

            $img = Image::configure(['driver' => 'imagick'])
                        ->make($image)
                        ->encode($image->getMimeType(), 100);

            Storage::put($name, $img);
            $project->images()->create(['url' => '/img' . $name]);

            $i++;
        }

        return redirect()->route('admin.projects.edit', $project);
    }

    public function edit( Project $project, Request $request ) {
        $project->slug = Str::slug($request->title);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->type = $request->type;
        $project->won = ($request->won != '----' ? $request->won : null);
        $project->link = $request->link;
        $project->year = $request->year;

        $project->save();

        return redirect()->back();
    }

    public function deleteWithFolder( Project $project ) {
        Storage::deleteDirectory('/projects/' . $project->slug);
        $project->delete();

        return redirect()->route('admin.projects');
    }
}
