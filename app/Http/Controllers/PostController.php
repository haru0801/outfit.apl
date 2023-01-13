<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Inertia\Inertia;
use Redirect;
use Illuminate\Http\Request;

class PostController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {   
         return inertia("Posts/Index",["posts" => $post->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
         return inertia("Posts/Create");
    }

    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return Redirect::route('post.show', $post->id);
    }
    public function show(Post $post)
    {
        return inertia("Posts/Show", ["post" => $post]);
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
