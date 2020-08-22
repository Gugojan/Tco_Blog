<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
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
        $comment = Comment::all();
        $post = Post::all();
        return response()->view('post.index',
            compact('post','comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $rules = [
            'title' => 'required',
            'text' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        $post::create([
            'user_id'=>Auth::user()->id,
            'title'=> $request->title,
            'text'=> $request->text,
        ]);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $myPost = Post::find($post->id);
        $myPost = $myPost->comment;
        return response()->view('post.show',
            compact('myPost','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $comment = Comment::all();
        $posts = Post::all();
        return response()->view('post.comment',
            compact('post','comment','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $posts = new Post();
        $rules = [
            'title' => 'required',
            'text' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
            $posts::where('id', $post->id)->update([
                'title'=> $request->title,
                'text'=> $request->text,
            ]);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('post');
    }

    public function featch($status, $id){
dd($status, $id);

    }
    public function deleteUser($id){
        User::destroy($id);
        return redirect('post');
    }
}
