<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Season;
use App\Position;
use App\Player;
use App\Country;
use DB;
use Redirect;
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
         $seasons = Season::all();

         return view('admin.players.index', compact('seasons', $seasons));

        // $seasons = Season::all();
        // return view('admin.players.index', compact('seasons', $seasons));
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
            'player_weight'=>'required','player_height'=>'required','player_number'=>'required','season_id'=>'required','position_id'=>'required',
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
            'number'=>$request->get('player_number'),
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
        $player = Player::find($id);
        $seasons = Season::all();
        $positions = Position::all();
        $countries = Country::all();

        return view('admin.players.edit', 
            compact('player', $player, 'seasons', $seasons, 
                'positions', $positions, 'countries', $countries));
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
        $this ->validate($request,
            ['name'=>'required', 'lastname'=>'required','birthdate'=>'required','birthplace'=>'required',
            'player_weight'=>'required','player_height'=>'required','player_number'=>'required','season_id'=>'required','position_id'=>'required',
            'country_id'=>'required']);
    
         $player = Player::find($id);

         
          if ($request->file('edit-player-photo')) {
          $this->validate($request,['edit-player-photo'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

            $photoFile = $player->photo;
                if(\File::isFile($photoFile)){
                \File::delete($photoFile);
             }

            $file = $request->file('edit-player-photo');

            $photo_path = 'images/players/';
           
            $photo_name = $file->getClientOriginalName();

            $file->move($photo_path, $photo_name);
          
            $player->photo = $photo_path.$photo_name;
        }


        $player->name = $request->get('name');
        $player->lastname =$request->get('lastname');
        $player->birth_date = $request->get('birthdate');
        $player->birth_place = $request->get('birthplace');
        $player->weight = $request->get('player_weight');
        $player->height = $request->get('player_height');
        $player->number = $request->get('player_number');
        $player->season_id = $request->get('season_id');
        $player->position_id = $request->get('position_id');
        $player->country_id = $request->get('country_id');
      
        $player->save();
     
        flash()->success('','Redaguota!');

        return Redirect::to('/dashboard/players/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $player = Player::find($id);
       
       $file = $player->photo;
       
       if(\File::isFile($file)){
            \File::delete($file);
        }
    
       $player->delete();
       flash()->success('','Žaidėjas panaikintas!');
       return redirect()->back();
    }

    public function getPlayerBySeason($slug)
    {
        $season = Season::where('slug', '=', $slug)->first();
        
        $players = $this->playersBySeason($season->id);

        $players_list = array();
        foreach ($players as $key => $value) {
            $players_list[$value->position_shortcode][] = $value;
        }
       // return response()->json($players);
            return view('pages.roster', compact('players_list', $players_list));

    }

    public function getPlayerBySeason2($id)
    {
        $players_list = $this->playersBySeason($id);

        //return Response::json(array('players'=>$players,'country'=>$country));
        return response()->json($players_list);
    }

    private function playersBySeason($id)
    {
        $players = DB::table('players')
            ->select(
                'players.id AS player_id',
                'players.name AS player_name', 
                'players.lastname AS last_name', 
                'players.number AS player_number',
                'players.photo AS player_photo',
                'countries.title AS country_title',
                'positions.title AS position_title',
                'positions.shortcode AS position_shortcode'
            )
            ->leftJoin('countries', 'countries.id', '=', 'players.country_id')
            ->leftJoin('positions', 'positions.id', '=', 'players.position_id')
            ->where('players.season_id', '=', $id)
            ->orderBy('positions.position', 'ASC')
            ->orderBy('players.number', 'ASC')
            ->get();

        return $players;
    }
}
