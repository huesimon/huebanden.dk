<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::idDesc()->get();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // Validate the post using the StorePost class
            
        
        $post = Auth::user()->createPost(new Post($validated));
        // Store the post
        $post->save();

        // TODO:: REFACTOR THIS WHEN YOU KNOW HOW TO DO THIS PROPERLY
        // Photo Validation
        $this->savePhoto($request, $post);
        // TODO:: REFACTOR THIS PREVIOUS PART WHEN YOU KNOW HOW TO!
        
        // Redirect back
        Session::flash('message', 'Post created');
        return Redirect::to('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->idDesc()->get()
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
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        // Validate the post using the StorePost class
        
        $validated = $request->validated();
        $post->fill($validated);

        // TODO:: REFACTOR THIS WHEN YOU KNOW HOW TO DO THIS PROPERLY
        // Photo Validation
        $this->savePhoto($request, $post);

        // TODO:: REFACTOR THIS PREVIOUS PART WHEN YOU KNOW HOW TO!

        // Store the post
        $post->save();
 
        // Redirect back
        Session::flash('message', 'Post was updated');
        return Redirect::to('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function savePhoto(Request $request, Post $post)
    {
        $photoValidated = $request->validate([
            'photo' => 'nullable|file'
        ]);

        if ($photoValidated) {
            $path = Storage::putFile('photos', $photoValidated['photo']);
        
            $photo = Auth::user()->createPhoto(new Photo([
                'path' => $path,
            ]));
        
            $post->photos()->attach($photo);
        }
    }
}
