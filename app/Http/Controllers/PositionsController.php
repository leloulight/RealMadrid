<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Position;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        return view('admin.positions.index', compact('positions', $positions));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,['position_title'=>'required', 'position_shortcode'=>'required']);

        $position = new Position(array(
            'title'=>$request->get('position_title'),
            'shortcode' => $request->get('position_shortcode')
            ));
 
        $position->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Nauja pozicija sukurta');

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
        $position = Position::find($id);

        return view('admin.positions.edit', compact('position', $position));
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
        $position = Position::find($id);

        $position_title = $request->get('position_title');
        $position_shortcode = $request->get('position_shortcode');

        $position->title = $position_title;
        $position->shortcode = $position_shortcode;

        $position->save();

        flash()->success('','Pakeista pozicija!');
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
}
