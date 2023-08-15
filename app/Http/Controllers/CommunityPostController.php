<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Community $community)
    {
        return view('posts.create', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Community $community)
    {
        $community->posts()->create($request->validated() + [
                'user_id' => auth()->id(),
            ]);
        return redirect()->route('communities.show', $community)->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community, Post $post)
    {

        return view('posts.show', compact('post', 'community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community, Post $post)
    {
        $post->delete();

        return redirect()->route('communities.show', $post->community)->with('message', 'Post deleted successfully');
    }
}