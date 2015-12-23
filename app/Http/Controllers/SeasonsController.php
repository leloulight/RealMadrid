<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Season;
use DB;
use App\Http\Controllers\Controller;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons =  DB::table('seasons')->orderBy('position', 'asc')->get();
        return view('admin.seasons.index', compact('seasons', $seasons));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,['season_title'=>'required', 'position'=>'required']);

        $season = new Season(array(
            'title'=>$request->get('season_title'),
            'position' => $request->get('position'),
            'slug' => str_slug($request->get('season_title'))
            ));
 
        $season->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Naujas sezonas sukurtas');

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
        $season = Season::find($id);
        return view('admin.seasons.edit', compact('season', $season));
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
        $season = Season::find($id);

        $season_title = $request->get('season_title');
        $position = $request->get('position');

        $season->title = $season_title;
        $season->position = $position;

        $season->save();

        flash()->success('','Pakeistas sezonas!');
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
       /*$season = Season::find($id);

       $season->delete();
       flash()->success('','Sezonas panaikintas');
       return redirect()->back();*/
    }
}
