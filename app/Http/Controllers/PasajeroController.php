<?php

namespace App\Http\Controllers;


use App\Pasajero;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PasajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $pasajeros=Pasajero::all();
        return view('Pasajero',compact('pasajeros'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@return Application|Factory|Response|View
    */
    public function store(Request $request)
    {
        $pasajero=new Pasajero;

        $pasajero->nombre       =$request->nombre;
        $pasajero->equipaje     =$request->equipaje;
        $pasajero->descuento    =$request->descuento;
        $pasajero->idautobus    =$request->idautobus;
        $pasajero->save();
        return back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasajero  $pasajero
     * @return Application|Factory|Response|View
     */
    public function update(Request $request, $id)
    {
        $Pasajero=Pasajero::find($id);
        $Pasajero->nombre=$request->nombre;
        $Pasajero->equipaje=$request->equipaje;
        $Pasajero->descuento=$request->descuento;
        $Pasajero->idautobus=$request->idautobus;
        $Pasajero->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasajero  $pasajero
     * @return Application|Factory|Response|View
     */
    public function destroy($id)
    {
        Pasajero::destroy($id);
        return back();
    }
}
