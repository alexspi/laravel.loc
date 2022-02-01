<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Auth;
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
        $posts = Post::with(['user', 'category', 'tags', 'comments'])->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'name')->all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title'       => $request->title,
            'body'        => $request->body,
            'category_id' => $request->category_id,
        ]);

        $tagsId = collect($request->tags)->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        $post->tags()->attach($tagsId);


        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load(['user', 'category', 'tags', 'comments']);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $categories = Category::pluck('name', 'id')->all();
            $tags = Tag::pluck('name', 'name')->all();

            return view('posts.edit', compact('post', 'categories', 'tags'));
        }
        return redirect()->route('blog')->with('error', __('messages.cannotedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->id);

        $post->update([
            'title'       => $request->title,
            'body'        => $request->body,
            'category_id' => $request->category_id,
        ]);

        $tagsId = collect($request->tags)->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        $post->tags()->sync($tagsId);

        return redirect()->route('blog')->with('success', __('messages.postcreate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Post $post)
    {
        $post->delete();

        return redirect()->route('blog')->with('success', __('messages.postdelete'));
    }
}
