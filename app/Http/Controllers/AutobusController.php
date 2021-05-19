<?php

namespace App\Http\Controllers;

use App\Autobus;
use http\Env\Response;
use Illuminate\Http\Request;

class AutobusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $autobuses=Autobus::all();
        return view('Autobus',compact('autobuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosAutobus=$request->all();
        $datosAutobus=$request->except('_token');
        Autobus::insert($datosAutobus);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function show(Autobus $autobus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function edit(Autobus $autobus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosAutobus=$request->except('_token','_method');
        Autobus::where('id',$id)->update($datosAutobus);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Autobus::destroy($id);
        return back();
    }
}
