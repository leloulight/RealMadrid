<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\League;
use App\Stadium;
use App\Fixture;
use App\Team;
use App\Http\Requests\createHeaderFixtureRequest;
use App\Http\Controllers\Controller;

class FixturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::all();

        $stadiums = Stadium::all();

        $teams = Team::all();

        return view('admin.fixtures.create',
             compact('leagues', $leagues ,'teams', $teams, 'stadiums', $stadiums));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this ->validate($request,['league_id'=>'required', 'league_id'=>'required', 'fixture_date'=>'required', 'team_1_id'=>'required', 'team_2_id'=>'required', 'team_1_score'=>'required', 'team_2_score'=>'required']);

       $fixture = new Fixture(array(
             'stadium_id' => $request->get('stadium_id'),
             'league_id'  => $request->get('league_id'),
             'fixture_date'  => $request->get('fixture_date'),
             'team_1_id'  => $request->get('team_1_id'),
             'team_2_id'  => $request->get('team_2_id'),
             'team_1_score'  => $request->get('team_1_score'),
             'team_2_score'  => $request->get('team_2_score'),
            ));
       
        $fixture->save();

        flash()->success('', 'Rungtynės sukurtos');

        return redirect()->back();
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
        //
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
    }
}
