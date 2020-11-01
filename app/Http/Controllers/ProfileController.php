<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $posts = \App\Models\Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $postscount = \App\Models\Post::where('user_id', $user->id)->count();

        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
            'postscount' => $postscount
        ]);
    }

    public function create(){
        return view('createProfile');
    }

    public function postCreate(){
       $data = request()->validate([
           'description' => 'required',
           'profilepic' => 'image',
       ]);

       // Load the existing profile
       $user = Auth::user();
      
       //this is empty and returning null
       $profile = Profile::where('user_id', $user->id)->first();
       if(empty($profile)){
           $profile = new Profile();
           $profile->user_id = $user->id;
       }

       $profile->description = request('description');

       // Save the new profile pic... if there is one in the request()!
       if (request()->has('profilepic')) {
           $imagePath = request('profilepic')->store('uploads', 'public');
           $profile->image = $imagePath;
       }

       // Now, save it all into the database
       $updated = $profile->save();
       if ($updated) {
           return redirect('/profile');
       }
   }

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('editProfile', [
            'profile' => $profile
        ]);
    }

    public function update(){
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => 'image',
        ]);
    
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
    }

}