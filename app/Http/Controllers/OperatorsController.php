<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Operator;
use Laracasts\Flash\Flash;
use App\Http\Requests\OperatorRequest;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $operators = Operator::search($request->name)->orderBy('name', 'ASC')->paginate(10);
        return view('admin.operators.index')->with('operators', $operators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperatorRequest $request)
    {
        $operator = new Operator($request->all());
        $operator->save();
        Flash::success("Se ha registrado ". $operator->name . " de forma exitosa!");
        return redirect()->route('admin.operators.index');
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
        $operator = Operator::find($id);
        return view('admin.operators.edit')->with('operator',$operator);
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
        $operator = Operator::find($id);
        $operator->fill($request->all());
        $operator->save();
        Flash::warning('El operador ' . $operator->name . ' ha sido editado con exito!');
        return redirect()->route('admin.operators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = Operator::find($id);
        $operator->delete();
        Flash::error('El operador ' . $operator->name . ' ha sido borrado de forma exitosa!');
        return redirect()->route('admin.operators.index');
    }
}
