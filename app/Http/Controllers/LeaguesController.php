<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\createLeagueRequest;
use App\League;
use Redirect;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\Controller;

class LeaguesController extends Controller
{
    protected $_league_logo_path = 'images/leagues/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::all();
        return view('admin.leagues.index', compact('leagues', $leagues));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['league_title'=>'required', 'file'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);
         //dd($request->all());
        if ($request->file('file')) {
            //$this->validate($request,['file'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);
            $file = $request->file('file');

            $path = $this->_league_logo_path;
           
            $name = uniqid().$file->getClientOriginalName();

            $file->move($path, $name);

        }

        $league = new League(array(
            'title'=>$request->get('league_title'),
            'logo_name' => $name,
            'logo_path' => $path
            ));
 
        $league->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Nauja lyga sukurta');

        return redirect()->back();
    }

    public function fixtureLeague(Request $request)
    {
        $this->validate($request,['league_title'=>'required', 'file'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);
         //dd($request->all());
        if ($request->file('file')) {
            //$this->validate($request,['file'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);
            $file = $request->file('file');

            $path = $this->_league_logo_path;
           
            $name = uniqid().$file->getClientOriginalName();

            $file->move($path, $name);

        }

        $league = new League(array(
            'title'=>$request->get('league_title'),
            'logo_name' => $name,
            'logo_path' => $path
            ));
 
        $league->save();

        $leagues = League::all();

        return response()->json($leagues);
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
        $league = League::where('id', '=', $id)->first();

        return view('admin.leagues.edit', compact('league', $league));
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
    
         $league = League::find($id);

         
          if ($request->file('edit-league-logo')) {
          $this->validate($request,['edit-league-logo'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

            $logoFile = $league->logo_path.$league->logo_name;
                if(\File::isFile($logoFile)){
                \File::delete($logoFile);
             }

            $file = $request->file('edit-league-logo');

            $league_logo_path = $this->_league_logo_path;
           
            $league_logo_name = $file->getClientOriginalName();

            $file->move($league_logo_path, $league_logo_name);
          
            $league->logo_name = $league_logo_name;
            $league->logo_path = $league_logo_path;
        }


        $league->title = $request->get('title');
      
        $league->save();
     
        flash()->success('','Redaguotas!');

        return Redirect::to('/dashboard/leagues/');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $league = League::find($id);
       
       $path = $league->logo_path;
       $name = $league->logo_name;
       $file = $path.$name;
       
       if(\File::isFile($file)){
            \File::delete($file);
        }
    
       $league->delete();
       flash()->success('','Lyga ištrinta!');
       return redirect()->back();
        
    }
}
