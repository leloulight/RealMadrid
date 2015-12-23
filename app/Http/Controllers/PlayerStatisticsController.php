<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Player;
use App\Season;
use App\Country;
use App\Position;
use App\PlayerStatistic;
use DB;
use App\Http\Controllers\Controller;

class PlayerStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $seasons = Season::all();

       return view('admin.player_statistics.index', compact('seasons', $seasons));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();
        return view('admin.player_statistics.create', compact('players', $players));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statistics = new PlayerStatistic(array(
             'player_id' => $request->get('player_id'),
             'goals'  => $request->get('player_goals'),
             'assists'  => $request->get('player_assists')
            ));
       
        $statistics->save();

        flash()->success('','Statistika sukurta!');

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

    public function getPlayerStatisticsBySeason($id)
    {
        $statistics = DB::table('players')
            ->leftJoin('player_statistics', 'players.id', '=', 'player_statistics.player_id')
            ->leftJoin('countries', 'countries.id', '=', 'players.country_id')
            ->leftJoin('positions', 'positions.id', '=', 'players.position_id')
            ->select(
                'players.id AS player_id',
                'players.name AS player_name', 
                'players.lastname AS last_name', 
                'countries.title AS country_title',
                'positions.title AS position_title',
                'player_statistics.goals AS player_goals',
                'player_statistics.assists AS player_assists'

            )
            ->where('players.season_id', '=', $id)
            ->orderBy('player_statistics.goals', 'DESC')
            ->orderBy('player_statistics.assists', 'DESC')
            ->get();

        return response()->json($statistics);
    }
}
