<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\createStadiumRequest;
use Redirect;
use App\Stadium;
use App\Http\Controllers\Controller;

class StadiumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiums = Stadium::all();
        return view('admin.stadiums.index', compact('stadiums', $stadiums));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stadiums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,['stadium_title'=>'required']);
        
        Stadium::create($request->all());

        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Naujas stadionas sukurtas');

        return Redirect::to('/dashboard/stadiums/');
    }

    public function fixtureStadium(Request $request)
    {
        $this->validate($request,['stadium_title'=>'required']);
         //dd($request->all());
   
        $stadium = new Stadium(array(
            'title'=>$request->get('stadium_title')
            ));
 
        $stadium->save();

        $stadiums = Stadium::all();

        return response()->json($stadiums);
    }

    public function teamStadiums(Request $request)
    {
        $this->validate($request,['stadium_title'=>'required']);
         //dd($request->all());
   
        $stadium = new Stadium(array(
            'title'=>$request->get('stadium_title')
            ));
 
        $stadium->save();

        $stadiums = Stadium::all();

        return response()->json($stadiums);
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
        
        $stadium = Stadium::where('id', '=', $id)->first();

        return view('admin.stadiums.edit', compact('stadium', $stadium));
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $stadium = Stadium::find($id);
       
       $stadium->delete();
       flash()->success('','Stadionas panaikintas!');
       return Redirect::to('/dashboard/stadiums/');
    }
}
