<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\PostPhoto;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
		$posts = Post::latest()->published()->take(16)->get();

		$categoryPosts = Category::all();
    
        return view('pages.index', compact('posts', $posts, 'categoryPosts', $categoryPosts));
    }

    public function cookies(){

		$categoryPosts = Category::all();

    	return view('pages.cookie-policy', compact('categoryPosts', $categoryPosts));
    }
}
