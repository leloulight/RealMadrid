<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Post;
use App\PostPhoto;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;

class SearchController extends Controller
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
        $search = $request->get('search');


        // $search_query2 = explode(" ", $param);
        // $search_query2 = "album_name like '%".implode("%' AND album_name like '%", $search_query2)."%'";

        $posts = Post::where('title', 'like','%'. $search . '%')
            ->orWhere('body', 'like', '%'. $search . '%')
                       ->published()->latest()->skip(0)->take(20)->get();

      /*  $res_posts = array();
        foreach($posts as $post){
            $res_posts[] = array("post" => $post, "photos" => $post->photos->first(), "category"=>$post->category->first());
        }*/

        $categories = DB::table('categories')
            ->where('title', 'like','%'. $search . '%')
                    ->skip(0)->take(20)->get();

        $tags = DB::table('tags')
            ->where('title', 'like','%'. $search . '%')
                    ->skip(0)->take(20)->get();

        return view('pages.search-results', compact('search',$search,'posts', $posts, 'categories', $categories, 'tags', $tags));

    }

    /**
     * Store a newly created ajax resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ajaxSearch(Request $request)
    {
        $search = $request->get('search');


        // $search_query2 = explode(" ", $param);
        // $search_query2 = "album_name like '%".implode("%' AND album_name like '%", $search_query2)."%'";

        $posts = Post::where('title', 'like','%'. $search . '%')
            ->orWhere('body', 'like', '%'. $search . '%')
            ->published()
            ->skip(0)
            ->take(7)
            ->get();

        $res_posts = array();
        foreach($posts as $post){
            $res_posts[] = array("post" => $post, "photos" => $post->photos->first(), "category"=>$post->category->first());
        }

        $categories = DB::table('categories')
            ->where('title', 'like','%'. $search . '%')
            ->skip(0)
            ->take(10)
            ->get();

        $tags = DB::table('tags')
            ->where('title', 'like','%'. $search . '%')
            ->skip(0)
            ->take(10)
            ->get();

        $response = array("posts" => $res_posts, "categories" => $categories, "tags" => $tags);

        return response()->json($response);
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
