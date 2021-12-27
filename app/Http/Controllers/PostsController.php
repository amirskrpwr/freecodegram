<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::WhereIn('user_id', $users)->with('user')->latest()->paginate(5);        
        $profiles = Profile::all();
        
        return view('posts.index', compact('posts', 'profiles'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){    

        $data = request()->validate(
            [
                'caption' => 'required',
                'image' => ['required', 'image'],
            ]
        );

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 800);
        $image->save();

        auth()->user()->posts()->create(
            [
                'caption' => $data['caption'],
                'image' => $imagePath,
            ]
        );

        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(Post $post){
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
        return view('posts.show', compact('post','follows'));
    }

    public function edit(Post $post){
        $this->authorize('update', $post->user->profile);
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'caption' => 'required',
            'image' => '',
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 800);
            $image->save();   

            $imageArray = ['image' => $imagePath]; 
        }

        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/post/" . $post->id);
    }

    public function destroy(Post $post){
        $post->delete($post);
        return redirect('/profile/'. $post->user->id);
    }
}

