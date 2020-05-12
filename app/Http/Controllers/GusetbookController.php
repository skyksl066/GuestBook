<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GusetbookController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('guestbook/guest-book')->with('title', 'GuestBook')->with('posts', $posts);
    }

    public function create()
    {
        return view('components/create')->with('title', '新增文章');
    }

    public function store()
    {
        $input = request()->all();

        $post = new Post;
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();

        return redirect('post');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('components/show')
            ->with('title', 'My Blog - '. $post->title)
            ->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('components/edit')
            ->with('title', '編輯文章')
            ->with('post', $post);
    }

    public function update($id)
    {
        $input = request()->all();

        $post = Post::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();

        return redirect('post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('post');
    }
}
