<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.head')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')

    @if (isset($posts))
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{ $post->name }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
            <br />
        @endforeach
    @endif



<form action="{{ url('post') }}" method="post">
@csrf

    <div class="form-group">
        @if (Route::has('login'))
        @auth
            <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->name }}</a>
            <input type="hidden" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
        @else
        <label for="title">暱稱</label>
        <input type="name" class="form-control" id="name" name="name">
        <input type="hidden" class="form-control" id="email" name="email" value="">
        @endauth
        @endif
    </div>
    <div class="form-group">
        <label for="content">留言</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">發表文章</button>
</form>

@endsection

