<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('features.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxlisting(Request $request)
    {

        $sql = \App\Models\Features::select("*")->where('user_id', Auth::user()->id);


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {


                return $data->id;
            })


            ->editColumn('features_name', function ($data) {
                return $data->features_name;
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="' . route('features.edit', $data->id) . '" class="btn btn-primary btn-sm editProduct">Edit</a> <a href="javascript:void(0)" data-link="' . route('features.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Delete </a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'features_name', 'action'])
            ->make(true);
    }


    public function create()
    {
        //
        return view ('features.addedit');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd("in");
        $request->validate([
            'features_name' => 'required',

        ]);

        $obj = new \App\Models\Features;
        $obj->feature_name = $request->features_name;


        $obj->save();

        return redirect()->route('features.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = \App\Models\Features::where('id',$id)->firstOrfail();

        return view('features.addedit',compact('editdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'features_name' => 'required',

        ]);

        $obj =  \App\Models\Features::where('id', $id)->first();
        $obj->features_name = $request->features_name;


        $obj->save();

        return redirect()->route('features.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = \App\Models\Features::where('id', $id)->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
