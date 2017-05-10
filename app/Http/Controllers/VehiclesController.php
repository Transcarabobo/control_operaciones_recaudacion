<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehicle;
use Laracasts\Flash\Flash;
use App\Http\Requests\VehicleRequest;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::search($request->id)->orderBy('id', 'ASC')->paginate(10);
        return view('admin.vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = new Vehicle($request->all());
        $id = $vehicle->id;
        $vehicle->save();
        Flash::success("Se ha registrado el vehiculo " . $id . " de forma exitosa!");
        return redirect()->route('admin.vehicles.index');
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
        $vehicle = Vehicle::find($id);
        return view('admin.vehicles.edit')->with('vehicle',$vehicle);
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
        $vehicle = Vehicle::find($id);
        $vehicle->fill($request->all());
        $vehicle->save();
        Flash::warning('El vehiculo ' . $vehicle->id . ' ha sido editado con exito!');
        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        Flash::error('El vehiculo ' . $vehicle->id . ' ha sido borrado de forma exitosa!');
        return redirect()->route('admin.vehicles.index');
    }

    public function status($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle->status == 'disabled') {
          $vehicle->status = 'enabled';
          Flash::message('El vehiculo <strong>' . $vehicle->id . '</strong> ha sido colocado <strong>Operativo</strong>!');
        } else {
          $vehicle->status = 'disabled';
          Flash::warning('El vehiculo <strong>' . $vehicle->id . '</strong> ha sido colocado <strong>Inperativo</strong>!');
        }
        $vehicle->save();
        return redirect()->route('admin.vehicles.index');
    }
}
