<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    protected $_post_photo_path = "images/countries/";
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
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this ->validate($request,['country_title'=>'required', 'file'=>'required|image:jpg,png,gif,bmp']);


        if ($request->file('file')) {
            $file = $request->file('file');

            $path = $this->_post_photo_path;
           
            $name = $file->getClientOriginalName();

            $file->move($path, $name);

        }

        $country = new Country(array(
            'title'=>$request->get('country_title'),
            'flag_name' => $name,
            'flag_path' => $path
            ));
 
        $country->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->overlay('Pavyko!','Nauja šalis sukurta');

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
