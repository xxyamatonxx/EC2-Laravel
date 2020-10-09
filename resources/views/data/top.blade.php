@extends('layouts.app')
@section('title','Top')
@section('content')
<div class="row">
  <div class="col-md-12 input-lg">
    <form action="{{route('save')}}" method="post">
      @csrf
      <input type="text" name="title" placeholder="タイトルを入力">
      @if($errors->has('title'))
      <div class="text-danger">
        {{$errors->first('title')}}
      </div>
      @endif
      <textarea name="body" cols="30" rows="10" placeholder="内容を入力"></textarea>
      @if($errors->has('body'))
      <div class="text-danger">
        {{$errors->first('body')}}
      </div>
      @endif
      <input type="submit" value="送信">
    </form>
  </div>
  @foreach($posts as $post)
  <div class="content col-md-12 border border-primary rounded m-1 ">
    <p> タイトル：{{$post->title}}</p>
    <p>記事:{!! nl2br(e($post->body)) !!}</p>
    <a href="{{route('detail',$post->id)}}">詳細・コメントをする</a>
    <form action="/delete/{{$post->id}}" method="post">
      @csrf
      <input type="submit" value="削除">
  </div>
  </form>
  <p>かかか</p>
  @endforeach
</div>
@endsection