{{-- 指定繼承 layout.head 母模板 --}}
@extends('layout.head')

{{-- 傳送資料到母模板，並指定變數為 title --}}
@section('title', $title)

{{-- 傳送資料到母模板，並指定變數為 content --}}
@section('content')

    {{-- 判斷後台傳入的$posts是否為空值 --}}
    @if (isset($posts))
        {{-- 將$posts一個個取出 --}}
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{-- 填入$posts中的name數值 --}}
                    <h4>{{ $post->name }}

                    {{-- 判斷使用者是否登入 --}}
                    @auth
                    {{-- 判斷使用者email跟留言者email是否相同 --}}
                    @if(Auth::user()->email == $post->email)
                    <ul class="nav justify-content-end" style="margin-top: -1.5rem;">
                        <li class="nav-item">
                            {{-- 網址guestbook/{id}/edit --}}
                            <a class="btn btn-outline-primary" href="{{ url('guestbook/'.$post->id.'/edit') }}">Edit</a>
                        </li>
                        {{-- 網址guestbook/{id} --}}
                        <form action="{{ url('guestbook/'.$post->id) }}" method="post">
                            @csrf {{-- 產生CSRF token --}}
                            {{-- method定義為DELETE --}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-primary">Delete</button>
                        </form>
                    </ul>
                    @endif
                    @endauth
                    </h4>
                    {{ $post->created_at }}
                </div>
                <div class="card-body">
                    {{-- 填入$posts中的content數值 --}}
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
            <br />
        @endforeach
    @endif
    {{-- 分頁頁數按鈕 --}}
    {{ $posts->links() }}
@if (isset($errors))
<span class="invalid-feedback" role="alert">
                <strong>{{ $errors }}</strong>
            </span>
@endif

<div class="card">
    <div class="card-header">Make Post</div>
    <div class="card-body">
        {{-- 網址guestbook --}}
        <form action="{{ url('guestbook') }}" method="post">
        @csrf {{-- 產生CSRF token --}}
            <div class="form-group">
                {{-- 判斷使用者是否登入 --}}
                @auth
                    <label for="title">Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                    <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                @endauth
                {{-- 判斷使用者是否登入 --}}
                @guest
                <label for="title">Name</label>
                {{-- 'old'輸入驗證如果沒通過頁面轉回來把剛剛送出的資料填回 --}}
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                <input type="hidden" class="form-control" id="email" name="email" value="">

                @error('name')
                {{-- 輸入驗證如果沒通過返還訊息 --}}
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @endguest
            </div>
            <div class="form-group">
                <label for="content">Message</label>
                {{-- 'old'輸入驗證如果沒通過頁面轉回來把剛剛送出的資料填回 --}}
                <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                @error('content')
                {{-- 輸入驗證如果沒通過返還訊息 --}}
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

