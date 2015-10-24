<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use Auth;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$comments = Comment::all()->latest()->get();

        return view('pages.posts.show', compact('comments', $comments));*/
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
    public function store(Request $request, $id)
    {
        $this->validate($request,['comment-text'=>'required']);
        if ($request->get("parent_id") != null) {
            $comment = new Comment(array(
                'body'  => $request->get('comment-text'),
                'likes'  => 0,
                'bad_comment'  => 0,
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'parent_id' => $request->get("parent_id")
            ));
        }else{
            $comment = new Comment(array(
                'body'  => $request->get('comment-text'),
                'likes'  => 0,
                'bad_comment'  => 0,
                'post_id' => $id,
                'user_id' => Auth::user()->id
            ));
        }
        $comment->save();
       
        $data = array("post_id"=>$id,"id" => $comment->id, "body" => $comment->body, "date" => $comment->created_at->diffForHumans(), "user_name" => $comment->user->name." ".$comment->user->lastname, "like" => $comment->likes, "bomb"=> $comment->bad_comment);
        
        return response()->json($data);
        //flash()->success('Success!','Your flyer has been created');
        //return redirect()->back();
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
