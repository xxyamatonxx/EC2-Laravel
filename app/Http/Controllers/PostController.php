<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //フォーム、投稿一覧表示
    public function showPosts(){
        $posts = Post::orderBy('id','desc')->get();
        return view('data.top',['posts' => $posts]);
    }
    //新規投稿保存
    public function saveData(PostRequest $request){
        $post=new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route('view'));
    }
    //詳細画面表示
    public function detail($id){
        $content = Post::find($id);
        return view('data.show', ['content' => $content]);
    }
    //削除機能
    public function delete($id){
        Post::find($id)->delete();
        return redirect(route('view'));
    }
    //編集機能
    public function edit($id){
        $content = Post::find($id);
        return view('data.edit',['content' => $content]);
    }
    //編集保存
    public function updata(Request $request,$id){
        $editPost= Post::find($id);
        $editPost->title = $request->title;
        $editPost->body = $request->body;
        $editPost->save();
        return redirect(route('view'));
    }
}
