@extends('layouts.app')
@section('title','Detail')
@section('content')

<div class="border mb-5 p-5 col-md-12">
  <p>タイトル：{{$content->title}}</p>
  <p>記事：{!! nl2br($content->body) !!}</p>
  <button class="btn btn-primary">
    <a class="text-dark" href="/edit/{{$content->id}}">投稿を編集</a>
  </button>
  <button class="btn btn-primary">
    <a class="text-dark" href="{{route('view')}}">戻る</a>
  </button>
</div>

<div class="row">
  <div class="col-md-12">
    <form action="{{route('addComment')}}" method="POST">
      @csrf
      <input type="hidden" value="{{$content->id}}" name="post_id">
      <textarea name="body" cols="30" rows="10" placeholder="コメントを入力"></textarea>
      @if($errors->has('body'))
      <div class="text-danger">
        {{$errors->first('body')}}
      </div>
      @endif
      <input type="submit" value="コメントを送信">
    </form>
  </div>

  <h2 class="col-md-12">Comments</h2>
  @forelse ($content->comments as $comment)
  <div class="col-md-12">
    <p class=" m-1">{{ $comment->body }}</p>
  </div>
  @empty
  <h3>コメントねぇぞ</h3>
</div>

@endforelse
@endsection