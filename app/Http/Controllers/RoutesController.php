<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Route;
use Laracasts\Flash\Flash;
use App\Http\Requests\RouteRequest;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'ASC')->paginate(10);
        return view('admin.routes.index')->with('routes', $routes);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.routes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = new Route($request->all());
        $route->save();
        Flash::success("Se ha registrado ". $route->name . " de forma exitosa!");
        return redirect()->route('admin.routes.index');
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
        $route = Route::find($id);
        return view('admin.routes.edit')->with('route',$route);
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
        $route = Route::find($id);
        $route->fill($request->all());
        $route->save();
        Flash::warning('La ruta ' . $route->name . ' ha sido editada con exito!');
        return redirect()->route('admin.routes.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        Flash::error('La ruta ' . $route->name . ' ha sido borrada de forma exitosa!');
        return redirect()->route('admin.routes.index');
    }
}
