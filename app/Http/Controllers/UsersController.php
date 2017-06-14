<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Caffeinated\Shinobi\Models\Role;
use Auth;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        $users->each(function($users){
            $users->roles->lists('id')->toArray();
        });
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt('66666666');
        $user->save();
        $user->syncRoles($request->roles);
        Flash::success("Se ha registrado ". $user->name . " de forma exitosa!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Repsponse
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
        $user = User::find($id);
        $roles = Role::orderBy('name', 'ASC')->lists('name', 'id');
        $my_roles= $user->roles->lists('id')->toArray();
        return view('admin.users.edit')
                    ->with('user',$user)
                    ->with('roles', $roles)
                    ->with('my_roles', $my_roles);
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
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        $user->syncRoles($request->roles);
        Flash::warning('El usuario ' . $user->name . ' ha sido editado con exito!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::error('El usuario ' . $user->name . ' ha sido borrado de forma exitosa!');
        return redirect()->route('admin.users.index');
    }

    public function password()
    {
        return view('admin.users.password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        if (Hash::check($request->mypassword, Auth::user()->password)) {
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password)]);
            Flash::success("Contraseña cambiada exitosamente!");
            return redirect()->route('welcome');
        }else{
            Flash::error("Credenciales incorrectas!");
            return redirect()->route('admin.users.password');
        }
    }
}
