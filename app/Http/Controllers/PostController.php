<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $list_post = Post::with('user')->get();
        return view('pages.post.index', compact('list_post'));
    }

    public function create()
    {
        info('create');
        return view('pages.post.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        // try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
        // } catch (\Throwable $th) {
        //     return abort(500);
        // }


        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('pages.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        // if ($request->user()->cannot('update', $post)) {
        //     abort(403);
        // }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {

        Gate::authorize('delete', $post);

        $post->delete();

        return redirect()->route('post.index');
    }

}
