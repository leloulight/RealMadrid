<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Stadium;
use Redirect;
use App\Team;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    protected $_team_logo_path = 'images/teams/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('admin.teams.index', compact('teams', $teams));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stadiums = Stadium::all();

        return view('admin.teams.create', compact('stadiums', $stadiums));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this ->validate($request,['team_title'=>'required', 'file'=>'required']);

          if ($request->file('file')) {
            $file = $request->file('file');

            $path = $this->_team_logo_path;
           
            $name = $file->getClientOriginalName();

            $file->move($path, $name);

        }

        $team = new Team(array(
            'title'=>$request->get('team_title'),
            'logo_name' => $name,
            'logo_path' => $path,
            'stadium_id'=>$request->get('stadium_id')
            ));
   
        $team->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Nauja komanda sukurta');

        return Redirect::to('/dashboard/teams/');
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
        $team = Team::where('id', '=', $id)->first();
        $stadiums = Stadium::all();

        return view('admin.teams.edit', compact('team', $team, 'stadiums', $stadiums));
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
        $this->validate($request,['title'=>'required']);
    
         $team = Team::find($id);

         
          if ($request->file('edit-team-logo')) {
          $this->validate($request,['edit-team-logo'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

            $logoFile = $team->logo_path.$team->logo_name;
                if(\File::isFile($logoFile)){
                \File::delete($logoFile);
             }

            $file = $request->file('edit-team-logo');

            $team_logo_path = $this->_team_logo_path;
           
            $team_logo_name = $file->getClientOriginalName();

            $file->move($team_logo_path, $team_logo_name);
          
            $team->logo_name = $team_logo_name;
            $team->logo_path = $team_logo_path;
        }


        $team->title = $request->get('title');
        $team->stadium_id = $request->get('stadium_id');
      
        $team->save();
     
        flash()->success('','Redaguotas!');

        return Redirect::to('/dashboard/teams/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $team = Team::find($id);
       
       $path = $team->logo_path;
       $name = $team->logo_name;
       $file = $path.$name;
       
       if(\File::isFile($file)){
            \File::delete($file);
        }
    
       $team->delete();
       flash()->success('','Komanda ištrinta!');
       return Redirect::to('/dashboard/teams/');
        
    }
}
