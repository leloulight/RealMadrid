<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Redirect;
use App\Http\Requests\CreatePostCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories', $categories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,['category'=>'required']);

        $category = new Category(array(
            'title'=>$request->get('category'),
            'slug'=>str_slug($request->get('category'))
            ));
 
        $category->save();
        //flash()->error('Success!','Your flyer has been created');
        flash()->success('','Nauja kategorija sukurta');

        return Redirect::to('/dashboard/category/');
    }

    public function ajaxStore(Request $request)
    {
        $this->validate($request,['new-post-category'=>'required']);
        
        $category = new Category(array(
            'title' => $request->get('new-post-category'),
            'slug'  => str_slug($request->get('new-post-category'))
        ));
        $category->save();

        return $this->getAllCategories();
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
        $category = Category::find($id);

        return view('admin.categories.edit',compact('category', $category));
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
        $category = Category::find($id);

        $category_title = $request->get('title');

        $category->title = $category_title;

        $category->save();

        flash()->success('','Pakeista kategorija');
        return Redirect::to('/dashboard/category/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);

       $category->delete();
       flash()->success('','Kategorija panaikinta');
       return redirect()->back();
    }

    private function getAllCategories(){
        return response()->json(Category::all());
    }

}
