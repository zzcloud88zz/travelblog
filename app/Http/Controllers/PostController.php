<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'caption' => 'required',
            'story' => 'required',
            'postpic' => ['required', 'image'],
        ]);
 
        $user = Auth::user();
        $profile = new Post();
        $imagePath = request('postpic')->store('images', 'public');
 
        $profile->user_id = $user->id;
        $profile->caption = request('caption');
        $profile->story = request('story');
        $profile->image = $imagePath;
        $saved = $profile->save();
 
        if ($saved) {
            return redirect('/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->first();
        $user = Auth::user();
        
        return view('post.show', [
            'post' => $post,
            'user' => $user
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'caption' => 'required',
            'story' => 'required',
            'postpic' => 'image',
        ]);
        
        $user = Auth::user();
        $profile = Post::find($post->id);

        if (request()->has('postpic')) {
        $imagePath = request('postpic')->store('images', 'public');
        $profile->image = $imagePath;
        }
        $profile->caption = request('caption');
        $profile->story = request('story');
        $saved = $profile->save();
 
        if ($saved) {
            $post = Post::find($post->id);
            return view('post.show', ['post' => $post, 'user' => $user]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post->id);
        $post->delete();
        return redirect('/profile');
    }
}
