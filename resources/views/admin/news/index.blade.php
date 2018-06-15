@extends('layouts.app') @section('content')
<div class="container pt-3">
    <div class="row pb-3 justify-content-between">
        <div class="col-auto"></div>
        <div class="col-auto">
            <a class="btn bootstrap-original btn-success" href="{{route('admin.news.edit')}}">新消息</a>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col bootstrap-original">
            <div id="news" class="shadow rounded">
                @php $firstShow = true; @endphp @foreach ($news as $new) @php $randomStr1 = str_random(10); $randomStr2 = str_random(10); @endphp @component('components.admin.news.card',['id'=>$new->id]) @slot('title') {{$new->date->month}}/{{$new->date->day}} {{$new->title}} @endslot @slot('content', $new->content) @slot('id', $new->id) @slot('route',route('admin.news.edit',$new->id)) @slot('parent','news') @slot('firstShow',$firstShow) @endcomponent @if ($firstShow) @php $firstShow = !$firstShow; @endphp @endif @endforeach
            </div>
        </div>
    </div>
</div>
@endsection