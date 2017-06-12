<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Role($request->all());
        $rol->save();
        $rol->syncPermissions($request->permissions);

        Flash::success('Se ha creado el rol <strong>' . $rol->name . '</strong> de forma satisfactoria!');
        return redirect()->route('admin.roles.index');
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
        $rol = Role::find($id);
        $permissions = Permission::orderBy('name', 'ASC')->lists('name', 'id');
        $my_permissions = $rol->permissions->lists('id')->toArray();

        return view('admin.roles.edit')
                ->with('rol', $rol)
                ->with('permissions', $permissions)
                ->with('my_permissions', $my_permissions);
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
        $rol = Role::find($id);
        $rol->fill($request->all());
        $rol->save();

        $rol->syncPermissions($request->permissions);

        Flash::warning('Se ha editado el rol <strong>' . $rol->name . '</strong> de forma exitosa!');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        $rol->delete();

        Flash::error('Se ha borrado el rol <strong>' . $rol->name . '</strong> de forma exitosa!');
        return redirect()->route('admin.roles.index');
    }
}
