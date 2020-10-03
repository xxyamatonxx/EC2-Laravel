<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //使用テーブルposts
    //テーブル名
    protected $table = 'posts';

    //可変可能項目
    protected $fillable = [
        'title',
        'body'
    ];

    //
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}