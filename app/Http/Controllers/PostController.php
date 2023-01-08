<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Inertia\Inertia;

use Illuminate\Http\Request;

class PostController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = post::select('id', 'title', 'body',)->get();

        return Inertia::render('Posts/index',[
            'posts'=> $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/create');
    }

    
    public function store(PostRequest $request)
    {
        Item::create([
            'title' => $request->title,
            'body'=> $request->body,
        ]);
        return to_route('items.index');
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/show',[
            'post' => $post,
        ]);
    }

   
    public function edit(post $post)
    {
        return Inertia::render('Posts/edit',[
           'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, post $post)
    {
        $item->title = $request->title;
        $item->body = $request->body;
        $item->save();

        return to_route('Posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();

        return to_route(('Posts.index'));

    }
}
