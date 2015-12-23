<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\League;
use App\Stadium;
use App\Fixture;
use App\Team;
use DB;
use Carbon\Carbon;
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
         $comingFixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'fixtures.id AS fixture_id',
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            ->where('fixtures.fixture_date', '>=', Carbon::now())
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->paginate(15);

            $latestFixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'fixtures.id AS fixture_id',
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            ->where('fixtures.fixture_date', '<', Carbon::now())
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->paginate(15);

        return view('admin.fixtures.index', compact('comingFixtures', $comingFixtures, 'latestFixtures', $latestFixtures));
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

        $fixture = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'fixtures.id AS fixture_id',
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            //->where('fixtures.fixture_date', '<', Carbon::now())
            ->where('fixtures.id', '=', $id)
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->get();

            return view('admin.fixtures.edit', compact('fixture', $fixture));
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
       $this->validate($request,['team_1_score'=>'required', 'team_2_score'=>'required']);
    
         $fixture = Fixture::find($id);

        $fixture->team_1_score = $request->get('team_1_score');
        $fixture->team_2_score = $request->get('team_2_score');
      
        $fixture->save();
     
        flash()->success('','Rezultatas redaguotas!');

        return redirect()->back();
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

    public function latest()
    {
        $fixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'fixtures.id AS fixture_id',
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            ->where('fixtures.fixture_date', '<', Carbon::now())
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->get();

        return view('admin.fixtures.latest', compact('fixtures', $fixtures));
    }
}
