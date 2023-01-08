<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Inertia\Inertia;

class ItemController extends Controller
{
    
    public function index()
    {   
        $Reviews = Review::select('id', 'title', 'body')->get();

        return Inertia::render('Reviews/Index',[
            'Review'=> $Reviews
        ]);
    }

    
    public function create()
    {
        return Inertia::render('Reviews/Create');
    }

   
    public function store(ReviewRequest $request)
    {
        Item::create([
            'title' => $request->title,
            'body'=> $request->body,
        ]);
        return to_route('Reviews.index');
    }

   
    public function show(Review $Review)
    {
        return Inertia::render('Reviews/Show',[
            'Review' => $Review,
        ]);
    }

    
    public function edit(Review $Review)
    {
        return Inertia::render('Reviews/Edit',[
            'Review' => $Review,
        ]);
    }

    
    public function update(ReviewRequest $request, Review $Review)
    {
        $item->title = $request->title;
        $item->body = $request->body;
        $item->save();

        return to_route('Reviews.index');
    }

    
    public function destroy(Review $Review)
    {
        $Review->delete();

        return to_route(('Reviews.index'));

    }
}