<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Production extends Model
{
    public function getPublishedAttribute() {
        return date('d. m. Y, G:i:s', strtotime($this->created_at));
    }

    public function add( Request $request ) {
        $production = new Production();

        $production->title = $request->title;
        $production->type  = $request->type;
        $production->link  = $request->link;
        $production->year  = $request->year;

        $production->save();

        return redirect()->route('admin.production.edit', $production);
    }

    public function edit( Production $production, Request $request ) {
        $production->title = $request->title;
        $production->type  = $request->type;
        $production->link  = $request->link;
        $production->year  = $request->year;

        $production->save();

        return redirect()->back();
    }
}
