<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLinkRequest;
use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkController extends Controller {
    public function index() {
        $links = Link::whereFor('dj')->get();

        return view('admin.links.index', compact('links'));
    }

    public function create() {
        return view('admin.links.add');
    }

    public function store(StoreLinkRequest $request): RedirectResponse {
        $data = $request->validated();

        $link = Link::create($data);

        return redirect()->route('admin.links.edit', $link);
    }

    public function edit(Link $link) {
        return view('admin.links.add', compact('link'));
    }

    public function update(StoreLinkRequest $request, Link $link): RedirectResponse {
        $link->update($request->validated());

        return redirect()->route('admin.links.edit', $link);
    }

    public function destroy(Link $link): RedirectResponse {
        $link->clicks()->delete();
        $link->delete();

        return redirect()->route('admin.links.index');
    }
}
