<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = [ 'content'];
    //进行关联 一个回复对应一个用户，一条回复属于一个话题
    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
