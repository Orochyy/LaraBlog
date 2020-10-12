<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(13);

        return view('catalog', compact('posts'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->name;
        $description = $request->description;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post;

        $post->name = $name;
        $post->description = $description;

        $post->save();

        $this->flashMessage($request, 'Post was created', 'success');


        return redirect()->route('catalog');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Post $post)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $post = Post::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('posts/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $post->name = $request->name;
        $post->description = $request->description;
        $post->updated_at = now();

        $post->save();

        $this->flashMessage($request, 'Post was updated', 'success');

        return redirect()->route('catalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param \App\Post $post
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delit($id, Post $post, Request $request)
    {
        //
        Post::find($id)->delete();

        $this->flashMessage($request, 'Post was deleted', 'success');

        return redirect()->route('catalog');
    }


}
