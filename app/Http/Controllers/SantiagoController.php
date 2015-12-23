<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Santiago;
use Redirect;
use App\Http\Controllers\Controller;

class SantiagoController extends Controller
{
    protected $_santiago_photo_path = 'images/santiago/';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $santiago = Santiago::latest()->first();

        return view('pages.realmadrid.santiago', compact('santiago', $santiago));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $santiago = Santiago::latest()->first();
        return view('admin.santiago.santiago', compact('santiago', $santiago));
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
         $this->validate($request,['opening'=>'required', 'dimensions'=>'required', 'address'=>'required', 'capacity'=>'required']);
    
         $santiago = Santiago::find($id);

         
          if ($request->file('edit-santiago-photo')) {
          $this->validate($request,['edit-santiago-photo'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

            $santiagoFile = $santiago->photo_path.$santiago->photo_name;
                if(\File::isFile($santiagoFile)){
                \File::delete($santiagoFile);
             }

            $file = $request->file('edit-santiago-photo');

            $santiago_photo_path = $this->_santiago_photo_path;
           
            $santiago_photo_name = $file->getClientOriginalName();

            $file->move($santiago_photo_path, $santiago_photo_name);
          
            $santiago->photo_name = $santiago_photo_name;
            $santiago->photo_path = $santiago_photo_path;
        }


        $santiago->opening = $request->get('opening');
        $santiago->dimensions = $request->get('dimensions');
        $santiago->address = $request->get('address');
        $santiago->capacity = $request->get('capacity');
      
        $santiago->save();
     
        flash()->success('','Santiago redaguotas!');

        return Redirect::to('/dashboard/santiago/');
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
