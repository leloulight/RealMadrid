<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Season;
use App\Position;
use App\Player;
use App\Country;
use App\Http\Controllers\Controller;

class PlayersController extends Controller
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
        $seasons = Season::all();
        $positions = Position::all();
        $countries = Country::all();
        return view('admin.players.create', 
            compact('seasons', $seasons, 'positions', $positions, 'countries', $countries));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,
            ['player_name'=>'required', 'player_lastname'=>'required','birth_date'=>'required','birth_place'=>'required',
            'player_weight'=>'required','player_height'=>'required','season_id'=>'required','position_id'=>'required',
            'country_id'=>'required','file'=>'required|image:jpg,png,gif,bmp']);


        if ($request->file('file')) {
            $file = $request->file('file');

            $path = 'images/players/';
           
            $name = $file->getClientOriginalName();

            $file->move($path, $name);

        }

        $player = new Player(array(
            'name'=>$request->get('player_name'),
            'lastname'=>$request->get('player_lastname'),
            'birth_date'=>$request->get('birth_date'),
            'birth_place'=>$request->get('birth_place'),
            'weight'=>$request->get('player_weight'),
            'height'=>$request->get('player_height'),
            'season_id'=>$request->get('season_id'),
            'position_id'=>$request->get('position_id'),
            'country_id'=>$request->get('country_id'),
            'photo' => $path.$name,
            
            ));

        $player->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->overlay('','Naujas žaidėjas sukurtas');

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
