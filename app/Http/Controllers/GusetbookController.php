<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Auth;

class GusetbookController extends Controller
{
    //顯示留言
    public function index()
    {
        //$posts = Post::all();
        //每頁資料筆數
        $row_per_page = 4;
        $posts = Post::OrderBy('created_at', 'desc')->paginate($row_per_page);

        return view('guestbook/guestbook')->with('title', 'GuestBook')->with('posts', $posts);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    //儲存至資料庫
    public function store()
    {
        $input = request()->all();

        $validator = Validator::make($input, [
            'name' => 'required|max:50',
            'content' => 'required|min:5',
        ]);

        if ($validator->fails()){
            print_r('error');
            return redirect('guestbook')->withErrors($validator)->withInput();
        }else{
            $post = new Post;
            $post->email = $input['email'];
            $post->name = $input['name'];
            $post->content = $input['content'];
            $post->save();
            return redirect('guestbook');
        }

    }

    //取出對應id傳到edit頁面
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('guestbook/guestbookedit')
            ->with('title', 'Edit Post')
            ->with('post', $post);
    }

    //更新對應id資料
    public function update($id)
    {
        $input = request()->all();

        $post = Post::find($id);
        $post->content = $input['content'];
        $post->save();

        return redirect('guestbook');
    }

    //刪除對應id資料
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('guestbook');
    }
}
