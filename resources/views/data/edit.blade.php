@extends('layouts.app')
@section('title','Edit')
@section('content')
  <form action="/edit/{{$content->id}}" method="post">
    @csrf
    <input type="text" name="title" value="{{$content->title}}">
    <textarea name="body" cols="30" rows="10" placeholder="内容を入力">{{$content->body}}</textarea>
    <input type="submit" value="編集を反映">
  </form>
@endsection