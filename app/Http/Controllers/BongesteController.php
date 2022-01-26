<?php

namespace App\Http\Controllers;

use App\Models\Bongeste;
use Illuminate\Http\Request;

class BongesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bongesteindex',['gestes'=>Bongeste::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bongestecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bongeste=Bongeste::create($request->only(['titre','contenu']));
        
     
        if($request->hasFile('path'))
        {
            $image=$request->path;
            $image_name =time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
            $bongeste->path=$image_name;
            $bongeste->save();
        }
        return redirect()->route('bongestes.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bongeste::destroy($id);
        return redirect()->route('bongestes.index');
    }
}
