<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Despatch;
use App\Route;
use App\Operator;
use Laracasts\Flash\Flash;

class DespatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despatches = Despatch::orderBy('date', 'DESC')->paginate(10);
        return view('admin.despatches.index')->with('despatches', $despatches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::orderBy('name', 'ASC')->lists('name', 'id');
        $operators = Operator::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.despatches.create')
                ->with('routes', $routes)
                ->with('operators', $operators);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despatch = new Despatch($request->all());
        $despatch->save();
        Flash::success("Se ha registrado el despacho de la unidad ". $despatch->unidad_id . " de forma exitosa!");
        return redirect()->route('admin.despatches.index');
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
        $despatch = Despatch::find($id);
        $routes = Route::orderBy('name', 'ASC')->lists('name', 'id');
        $operators = Operator::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.despatches.edit')
                ->with('despatch', $despatch)
                ->with('routes', $routes)
                ->with('operators', $operators);
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
        $despatch = Despatch::find($id);
        $despatch->fill($request->all());
        $despatch->save();
        Flash::warning('El despacho de la unidad ' . $despatch->unidad_id . ' ha sido editado con exito!');
        return redirect()->route('admin.despatches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despatch = Despatch::find($id);
        $despatch->delete();
        Flash::error('El despacho ' . $despatch->id . ' ha sido borrado de forma exitosa!');
        return redirect()->route('admin.despatches.index');
    }
}
