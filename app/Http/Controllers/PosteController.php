<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Poste;
use App\Models\Imageposte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posteindex',['postes'=>Poste::with('categorie')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postecreate',['categorie'=>Categorie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $poste=Poste::create($request->only(['titre','prix','description']));
        $poste->iduser=Auth::user()->id;
        $categorie=Categorie::where('categorie',$request->categorie)->first();
        $poste->idcategorie=$categorie->idcategorie;
        $poste->save();

        if($request->hasFile('image'))
        {
        foreach($request->image as $image)
        {
            $image_name =time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
            $images=Imageposte::create(['path'=>$image_name]);
            $images->poste()->associate($poste)->save();
        }
        

        }
        return redirect()->route('postes.index');
    
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
    
    public function updatestatut(Request $request, $id)
    {

        $poste=Poste::whereKey($id)->first();
        $poste->update($request->only(['statut']));

        return redirect()->back();
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poste::destroy($id);
        return redirect()->route('postes.index');
    }
}
