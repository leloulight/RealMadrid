<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\PostTags;
use App\PostPhoto;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Auth;
use File;
use Redirect;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;
use ImageOptimizer;

class PostsController extends Controller
{
    protected $_post_photo_path = 'images/post_photos/';

    public function __construct()
    {
        return $this->middleware('admin', ['except'=>['show', 'getPostsComments', 'getAllCategoriesPosts', 'getCategoriesSlug']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $unpublishedPosts = Post::latest()->unpublished()->paginate(15);
        $publishedPosts = Post::latest()->published()->paginate(15);   

        return view('admin.posts.index', 
            compact('publishedPosts', $publishedPosts, 'unpublishedPosts', $unpublishedPosts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         //flash()->aside('Success!','Your flyer has been created');
        $tags = Tag::all();
        $categories = Category::all(); 

        return view('admin.posts.create', compact('categories',$categories, 'tags', $tags));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {   
        $this ->validate($request,['title'=>'required','excerpt'=>'required|max:200','photo_description'=>'required','category_id'=>'required']);
        $post = new Post(array(
             'title' => $request->get('title'),
             'excerpt'  => $request->get('excerpt'),
             'body'  => $request->get('textarea-body'),
             'slug'  => str_slug($request->get('title')),
             'likes'  => 0,
             'opened'  => 0,
             'deleted'  => 0,
             'published_at'  => ($request->get('published_at') ? $request->get('published_at') : Carbon::now()),
             'user_id' => Auth::user()->id,
             'photo_description'=> $request->get('photo_description'),
             'category_id' => $request->get('category_id')
            ));

        $post->save();


        if ($request->get('tags')) {
            foreach ($request->get('tags') as $tag_id) {
                $post_tags = new PostTags(array(
                    'post_id' => $post->id,
                    'tag_id' => $tag_id
                ));
                $post_tags->save();
            }
        }

        if ($request->file('file')) {
            $path = $this->_post_photo_path;
            foreach ($request->file('file') as $file) {
                $name = uniqid() . "_" .$file->getClientOriginalName();

               // $coverAbsoluteFilePath = $file->getRealPath();
                //$coverExtension = $file->getClientOriginalExtension();

                // optimize (overwrite)
              //  $opt = new ImageOptimizer();
               // $opt->optimizeImage($coverAbsoluteFilePath, $coverExtension);

            $file->move($path, $name);



            $post->photos()->create(['name' => $name, 'path' => $path]);

            //unlink($path);

            }
            $post->save();
        }


        //flash()->error('Success!','Your flyer has been created');
         //flash()->overlay('Success!','Your flyer has been created');
        //flash()->overlay('Pavyko!','Naujiena sukurta!');
        //flash()->success('Success!','Your flyer has been created');
        return redirect()->back(); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($category_slug, $slug)
    {   
        $category = Category::where('slug', '=', $category_slug)->first();

        $comments = Comment::latest()->paginate(15);

        $post = Post::where('slug','=', $slug)->first();

        //$post_tags = PostTags::where('post_id', '=', $post->id)->get();
        //User::find(1)->role->name;
        $tags = Post::find($post->id)->tags;
        
        return view('pages.posts.show', 
            compact('post', $post, 'category', $category, 'comments', $comments, 'tags', $tags));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::where('id','=',$id)->first();
        $postTags2 = PostTags::where('post_id','=',$id)->get();

        $postTags = array();
        foreach ($postTags2 as $value) {
            $postTags[] = $value->tag_id;
        }

        //neveikai tagai
        //nepadaryta paveiksiukai
        //neikelia ir inserte 

        return view('admin.posts.edit', 
            compact('post', $post, 'categories', $categories, 'tags', $tags, 'postTags', $postTags ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
      $this ->validate($request,['title'=>'required','excerpt'=>'required','body'=>'required','photo_description'=>'required','category_id'=>'required']);

        $postRequest = $request->all();
         $post = Post::find($id);

         $post->title = $request->get('title');
         $post->excerpt  = $request->get('excerpt');
         $post->body  = $request->get('body');
         $post->slug  = str_slug($request->get('title'));
         $post->published_at  = ($request->get('published_at') ? $request->get('published_at') : Carbon::now());
         $post->user_id = Auth::user()->id;
         $post->photo_description = $request->get('photo_description');
         $post->category_id = $request->get('category_id');

         $post->save();

        $post_tags = PostTags::where('post_id','=', $id)->get();

        if (!isset($postRequest['tags'])) {
            foreach ($post_tags as $key => $value) {
                $post_tags[$key]->delete();
            }
        }else{
            foreach ($post_tags as $key => $value) {
                if(!in_array($value->tag_id, $postRequest['tags'])){
                    $post_tags[$key]->delete();
                }else{
                    $tmp = array_search($value->tag_id, $postRequest['tags']);
                    unset($postRequest['tags'][$tmp]);
                }
            }
        }
        if (isset($postRequest['tags'])) {
            foreach ($postRequest['tags'] as $tag_id) {
                $post_tags = new PostTags(array(
                    'post_id' => $post->id,
                    'tag_id' => $tag_id
                ));
                $post_tags->save();
            }
        }

        if ($request->get('post_photos')) {
            foreach ($request->get('post_photos') as $value) {
                $tmp = PostPhoto::find($value);
                if (file_exists($tmp->path.$tmp->name)) {
                    unlink($tmp->path.$tmp->name);
                }
                $file = $tmp->path.$tmp->name;
                if(\File::isFile($file)){
                \File::delete($file);
                 }

                $tmp->delete();
            }
        }

        if ($request->file('file')) {
            $path = $this->_post_photo_path;
            foreach ($request->file('file') as $file) {
                $name = uniqid() . "_" .$file->getClientOriginalName();
                $file->move($path, $name);

                $post->photos()->create(['name' => $name, 'path' => $path]);
            }
            $post->save();
        }else{
            flash()->overlay('','Naujiena pakeista!');
        }

        return Redirect::to('/dashboard/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       foreach($post->photos as $photo){
       $path = $photo->path;
       $name = $photo->name;
       $file = $path.$name;
       
       if(\File::isFile($file)){
            \File::delete($file);
        }
    }
       $post->delete();
       flash()->success('Pavyko!','Naujiena ištrinta!');
       return redirect()->back();
        
    }


    public function addPhotos(Request $request)
    {
       $file = $request->file('file');

       $name = time() . $file->getClientOriginalName();

       $file->move($this->_post_photo_path, $name);

       $post->photos()->create(['path'=>'images/post_photos/{$name}']);
    }


    public function getPostsComments(Request $request, $id){
        $comments = Comment::where("post_id","=",$id)->whereNull('parent_id')->latest()
            ->skip($request->get('from'))->take($request->get('count'))->get();

        $count = count(Comment::where("post_id","=",$id)->get());
        $data = array();


        foreach ($comments as $key => $value) {
            $comments2 = Comment::where("parent_id","=",$value->id)->latest()->get();
            $childs = array();
            if(count($comments2) > 0){
                foreach ($comments2 as $key2 => $value2) {
                    $childs[] = array("id" => $value2->id, "body" => $value2->body, "date" => $value2->created_at->diffForHumans(), "user_name" => $value2->user->name." ".$value2->user->lastname, "like" => $value2->likes, "bomb"=> $value2->bad_comment, "childs" => "NULL");
                }
            }

            $data[] = array("id" => $value->id, "body" => $value->body, "date" => $value->created_at->diffForHumans(), "user_name" => $value->user->name." ".$value->user->lastname, "like" => $value->likes, "bomb"=> $value->bad_comment, "childs" => $childs);
        }

        return response()->json(array("comments" => $data, "comment_count" => $count));
    }

    /*private function makeTree($array, $parent = null){
        foreach ($array as $key => $value) {
            if(){

            }
        }
        if () {
            # code...
        }
        $array
        return $item;
    }*/

    public function getAllCategoriesPosts()
    {

        $allPosts = Post::latest()->published()->paginate(10);

        return view ('pages.posts.category_posts' , 
            compact('allPosts', $allPosts));
    }

    public function getCategoriesSlug($slug)

    {

        $postCategory = Category::where('slug', '=', $slug)->first();

        $categorySlugPosts = Post::where('category_id', '=', $postCategory->id)->latest()->published()->paginate(10);
        
        return view ('pages.posts.category_posts_by_slug' , compact('categorySlugPosts', $categorySlugPosts));
    }


}
