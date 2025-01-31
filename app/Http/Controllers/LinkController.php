<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller {
    public function djIndex() {
        return view('djlinks')
            ->withLinks(Link::latest()->whereFor('dj')->get());
    }

    public function redirect(Request $request) {
        $url  = $request->url;
        $link = Link::whereUrl($url)->firstOrFail();
        $link->clicks()->create([
            'ip'       => $request->ip(),
            'referrer' => $request->referrer
        ]);

        return redirect()->to($link->url);
    }
}
