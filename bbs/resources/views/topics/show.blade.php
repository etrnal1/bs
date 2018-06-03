@extends('layouts.app')
@section('content')
@section('title','回复')
<div class="row">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
      
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">

        <div class="panel panel-default">
            <h1>最新回复</h1>
        </div>

        {{-- 用户回复列表 --}}
        <div class="panel panel-default topic-reply">
            <div class="panel-body">
                @include('topics._reply_box', ['topic' => $topic])
                @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
            </div>
        </div>

    </div>
</div>
@stop

