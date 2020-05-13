@extends('layout.head')

@section('content')

@if (isset($posts))
@foreach ($posts as $post)
@if ($post->email == Auth::user()->email)
<div class="card">
    <div class="card-header">
        {{ $post->name }}
        <form action="{{ url('post/'.$post->id) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-outline-success" type="submit">刪除</button>
        </form>
        <a class="btn btn-outline-success" href="{{ url('post/'.$post->id.'/edit') }}">編輯</a></li>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $post->content }}</p>
    </div>
</div>
<br />
@endif
@endforeach
@endif

@endsection


