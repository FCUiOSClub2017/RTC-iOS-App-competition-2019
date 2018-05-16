@extends('layouts.app') @section('content')
<div class="container py-3">
    <div class="row">
        <div class="col">
            <div class="list-group">
                <a class="text-white list-group-item list-group-item-action active">功能列表</a>
                <a href="{{route('admin.news.index')}}" class="list-group-item list-group-item-action">最新消息管理</a>
                <a href="{{route('admin.team.list')}}" class="list-group-item list-group-item-action">隊伍列表</a>
                <a class="text-white list-group-item list-group-item-action active">下載專區</a>
                <a href="{{route('admin.team.list.download')}}" class="list-group-item list-group-item-action">隊伍列表</a>
                <a href="{{route('admin.team.list.download')}}" class="list-group-item list-group-item-action">隊伍檔案</a>
                <a class="text-white list-group-item list-group-item-action active">開發專區</a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="row justify-content-between">
                        <div class="col">1</div>
                        <div class="col-auto"><datepicker :bootstrap-styling="true" :language="zh"></datepicker></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection