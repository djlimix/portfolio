<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLetsDanceRequest;
use App\LetsDance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LetsDanceController extends Controller
{
    public function index()
    {
        $episodes = LetsDance::all();

        return view('admin.ld.show', compact('episodes'));
    }

    public function create()
    {
        $latest_number = LetsDance::latest('number')->first()?->number ?? 0;

        return view('admin.ld.add', compact('latest_number'));
    }

    public function store(StoreLetsDanceRequest $request)
    {
        $data = $request->validated();

        $artwork = $request->file('artwork');

        unset($data['artwork']);

        $episode = LetsDance::create($data);

        $imgFile = Image::make($artwork->getRealPath())
                        ->fit(500, 500, function ($constraint) {
                            $constraint->upsize();
                        });

        Storage::drive('public')->put("artwork/{$episode->id}.jpg", $imgFile->encode('jpg'));

        return redirect()->route('admin.ld.edit', $episode);
    }

    public function edit(LetsDance $ld)
    {
        return view('admin.ld.add', compact('ld'));
    }

    public function update(LetsDance $ld, StoreLetsDanceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $artwork = $request->file('artwork');

        unset($data['artwork']);

        $ld->update($data);

        if (!empty($artwork)) {
            $imgFile = Image::make($artwork->getRealPath())
                            ->fit(500, 500, function ($constraint) {
                                $constraint->upsize();
                            });

            Storage::drive('public')->put("artwork/{$ld->id}.jpg", $imgFile->encode('jpg'));
        }

        return redirect()->back();
    }

    public function destroy(LetsDance $ld): RedirectResponse
    {
        Storage::drive('public')->delete("artwork/{$ld->id}.jpg");

        $ld->delete();

        return redirect()->route('admin.ld.index');
    }
}
