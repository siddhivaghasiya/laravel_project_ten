<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class featurecontroller extends Controller
{
    //

    public function save (Request $request  ){

        $request->validate([
            'features_name' => 'required',

        ]);

        $obj = new \App\Models\Features;
        $obj->features_name = $request->features_name;
        $obj->user_id = Auth::user()->id;


        $obj->save();

        return redirect()->route('features.index');
    }
}
