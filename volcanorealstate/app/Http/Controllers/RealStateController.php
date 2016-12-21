<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RealState;

class RealStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_states= RealState::All();
        return view('real_state.list',['real_states' => $real_states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("real_state.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save the real_state
        $real_state= new RealState;
        $real_state->name=$request->name;
        $real_state->description=$request->description;
        $real_state->save();
        return redirect()->action('RealStateController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $real_state=RealState::Find($id);
        return view("real_state.edit",[ 
                                        'name' => $real_state->name,
                                        'description' => $real_state->description,
                                      ]);
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
        $real_state=RealState::Find($id);
        return view("real_state.edit",[ 
                                        'id' => $real_state->id,
                                        'name' => $real_state->name,
                                        'description' => $real_state->description,
                                      ]);
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
        $real_state=RealState::Find($id);
        $real_state->name=$request->name;
        $real_state->description=$request->description;
        $real_state->save();
        return redirect()->action('RealStateController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        RealState::destroy($id);
        return redirect()->action('RealStateController@index');
    }
}
