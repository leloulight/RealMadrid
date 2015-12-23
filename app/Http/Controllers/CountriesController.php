<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use Redirect;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    protected $_country_flag_path = "images/countries/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        
        return view('admin.countries.index', compact('countries', $countries));
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

            $path = $this->_country_flag_path;
           
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

    public function playerCountry(Request $request)
    {
        $this->validate($request,['country_title'=>'required']);
         //dd($request->all());
        if ($request->file('ajax-country-flag')) {

           // $this->validate($request,['ajax-country-flag'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);
            $file = $request->file('ajax-country-flag');

            $path = $this->_country_flag_path;
           
            $name = uniqid().$file->getClientOriginalName();

            $file->move($path, $name);

        }

        $country = new Country(array(
            'title'=>$request->get('country_title'),
            'flag_name' => $name,
            'flag_path' => $path
            ));
 
        $country->save();

        $countries = Country::all();

        return response()->json($countries);
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
        $country = Country::find($id);

        return view('admin.countries.edit', compact('country', $country));
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
    
         $country = Country::find($id);

         
          if ($request->file('edit-country-flag')) {
          $this->validate($request,['edit-country-flag'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

            $flagFile = $country->flag_path.$country->flag_name;
                if(\File::isFile($flagFile)){
                \File::delete($flagFile);
             }

            $file = $request->file('edit-country-flag');

            $country_flag_path = $this->_country_flag_path;
           
            $country_flag_name = $file->getClientOriginalName();

            $file->move($country_flag_path, $country_flag_name);
          
            $country->flag_name = $country_flag_name;
            $country->flag_path = $country_flag_path;
        }


        $country->title = $request->get('title');
      
        $country->save();
     
        flash()->success('','Redaguota!');

        return Redirect::to('/dashboard/countries/');
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
