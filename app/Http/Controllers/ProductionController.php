<?php

namespace App\Http\Controllers;

use App\Production;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionController extends Controller
{

    /**
     * @return string
     */
    public function getAll() {
        return Production::orderByDesc('year')->get(['title', 'link', 'year', 'type'])->toJson();
    }
}
