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

    //儲存至資料庫
    public function store()
    {
        $input = request()->all();

        $post = new Post;
        $post->email = $input['email'];
        $post->name = $input['name'];
        $post->content = $input['content'];
        $post->save();

        return redirect('post');
    }

    //取出對應id傳到edit頁面
    public function edit($id)
    {
        $post = Post::find($id);

        return view('guestbook/guest-book-edit')
            ->with('title', '編輯文章')
            ->with('post', $post);
    }

    //更新對應id資料
    public function update($id)
    {
        $input = request()->all();

        $post = Post::find($id);
        $post->content = $input['content'];
        $post->save();

        return redirect('/home');
    }

    //刪除對應id資料
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/home');
    }
}
