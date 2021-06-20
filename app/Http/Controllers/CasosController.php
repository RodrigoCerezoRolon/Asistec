<?php

namespace App\Http\Controllers;

use App\Models\CasoExito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos=CasoExito::orderby('orden',"ASC")->get();
        return view('admin.casos.index',compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.casos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caso= new CasoExito($request->all());
        if($request->hasFile('logo')){
            $caso->logo=$request->file('logo')->store('images/casos');
        }
        if($request->hasFile('img')){
            $caso->imagen=$request->file('img')->store('images/casos');
        }
        if($request->hasFile('arch')){
            $caso->archivo=$request->file('arch')->store('images/casos');
        }
        try {
            $caso->save();
            return back()->with('success',"Caso agregado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
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
        $caso=CasoExito::find($id);
        return view('admin.casos.edit',compact('caso'));
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
        $caso=CasoExito::find($id);
        if($request->hasFile('logo')){
            Storage::delete($caso->logo);
            $caso->logo=$request->file('logo')->store('images/casos');
        }
        if($request->hasFile('img')){
            Storage::delete($caso->imagen);
            $caso->imagen=$request->file('img')->store('images/casos');
        }
        if($request->hasFile('arch')){
            Storage::delete($caso->archivo);
            $caso->archivo=$request->file('arch')->store('images/casos');
        }
        try {
            $caso->update($request->all());
            return back()->with('success',"Caso actualizado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caso=CasoExito::find($id);
        $caso->delete();
    }
}
