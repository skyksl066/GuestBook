<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.head')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
<br /><br /><br />
    @if (isset($posts))
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
            <br />
        @endforeach
    @endif

    <div><a href="{{ url('post/create') }}">新增</a></div>

<form action={{ url('post') }} method="post">
@csrf
    <div class="form-group">
        <label for="title">標題</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">

    </div>
    <div class="form-group">
        <label for="content">內容</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">發表文章</button>
</form>

@endsection

