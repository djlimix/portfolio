<?php

namespace App\Observers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectObserver {
    public function creating(Project $project) {
        $project->slug = Str::slug($project->title);
    }

    public function created(Project $project, Request $request) {
        $i = 1;
        foreach ($request->images as $image) {
            $name = '/projects/'.$project->slug.'/'.$i.'.'.$image->clientExtension();

            $img = Image::configure(['driver' => 'imagick'])
                        ->make($image)
                        ->encode($image->getMimeType(), 100);

            Storage::put($name, $img);
            $project->images()->create(['url' => '/media/img'.$name]);

            $i++;
        }
    }

    public function updated(Project $project, Request $request) {
        $i = 1;
        foreach ($request->images as $image) {
            $name = '/projects/'.$project->slug.'/'.$i.'.'.$image->clientExtension();

            $img = Image::configure(['driver' => 'imagick'])
                        ->make($image)
                        ->encode($image->getMimeType(), 100);

            Storage::put($name, $img);
            $project->images()->create(['url' => '/media/img'.$name]);

            $i++;
        }
    }

    public function deleted(Project $project) {
        //
    }

    public function restored(Project $project) {
        //
    }

    public function forceDeleted(Project $project) {
        //
    }
}
