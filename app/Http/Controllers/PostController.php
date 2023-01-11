<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::query()->latest()->paginate(10);
        if ($request->wantsJson()) {
            return $posts;
        }

        return inertia('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        return inertia('Posts/Create', [
            'event' => Event::find($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $new = Post::create([
            'event_id' => $request->event_id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($request->file) {
            foreach ($request->file as $file) {
                $newPhoto = Storage::putFileAs(
                    'posts/'.$new->id.'/pictures/'.$request->member_id,
                    $file,
                    Str::random(20).'.'.$file->getClientOriginalExtension()
                );

                $photo = new Photo;

                $photo->post_id = $new->id;
                $photo->path = $newPhoto;

                $photo->save();
            }
        }

        return redirect()->route('post.index')->with([
            'type' => 'success', 
            'message' => 'Post added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return inertia('Posts/Edit', [
            'post' => $post,
            'pics' => Photo::where('post_id',$post->id)->get(),
        ]);
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
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->update();

        return redirect()->route('post.index')->with([
            'type' => 'success',
            'message' => 'Edit successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Photo::where('post_id',$post->id)->delete();

        return redirect()->route('post.index')->with([
            'type' => 'error',
            'message' => 'Post deleted'
        ]);
    }
}
