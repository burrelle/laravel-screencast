<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Posts;
use App\Post;
use Carbon\Carbon;


class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();

        $posts = $posts->all();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::Create([
            'title' => request('title'), 
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        // $post->save();

        session()->flash('message', 'Your post has now been published');

        return redirect('/');

    }

}
