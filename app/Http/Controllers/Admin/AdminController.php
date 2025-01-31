<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Link;
use App\Production;
use App\Project;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller {
    public function index() {
        // TODO pridat statistiky ze kolko pozreti, kolko kliknuti atd (cez chart.js)
        return view('admin.index');
    }

    public function migrate()
    {
        Artisan::call('migrate --force');

        return redirect()->back();
    }

    public function cache()
    {
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('route:cache');

        return redirect()->back();
    }
}
