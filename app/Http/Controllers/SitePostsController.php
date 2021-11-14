<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SitePostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));
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
    public function show($slug)
    {
        //
        $post = Post::findBySlugOrFail($slug);
        $next_post = Post::where('id' , '>' , $post->id)->orderBy('id')->first();
        $previous_post = Post::where('id' , '<' , $post->id)->orderBy('id', 'desc')->first();

        $comments = $post->comments->where('is_active','=','1');

        $categories = Category::all();
        $recent_posts = Post::orderBy('id', 'desc')->paginate('3');

        return view('posts.show', compact('post', 'next_post', 'previous_post', 'comments', 'categories', 'recent_posts'));
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


    /**
     * Posts By Category Slug
     */

    public function postsByCategory($slug) {
        $category = Category::findBySlugOrFail($slug);
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(12);
        return view('posts.posts-by-category', compact('category', 'posts'));
    }
}
