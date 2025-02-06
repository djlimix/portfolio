<?php

namespace App\Http\Controllers;

use App\LetsDance;

class LetsDanceController extends Controller
{
    public function index()
    {
        $episodes = LetsDance::latest('number')->get();

        return view('letsdance.index', compact('episodes'));
    }

    public function show(LetsDance $ld)
    {
        return view('letsdance.show', compact('ld'));
    }
}
