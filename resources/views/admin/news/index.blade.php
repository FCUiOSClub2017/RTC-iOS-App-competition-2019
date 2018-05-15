@extends('layouts.app') @section('content')
<div class="container pt-3">
    <div class="row pb-3">
        <div class="col">
            <a class="btn btn-secondary" href="{{route('news.edit')}}">返回列表</a>
        </div>
        <div class="col">
            <a class="btn btn-secondary" href="{{route('news.edit')}}">新消息</a>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col bootstrap-original">
            <div id="news" class="shadow rounded">
                @php $firstShow = true; @endphp @foreach ($news as $new) @php $randomStr1 = str_random(10); $randomStr2 = str_random(10); @endphp
                @component('components.news.card') @slot('title') {{$new->date->month}}/{{$new->date->day}}  {{$new->title}} @endslot @slot('content', $new->content) @slot('route',route('news.edit',$new->id)) @slot('parent','news') @slot('firstShow',$firstShow) @endcomponent
                @if ($firstShow) @php $firstShow = !$firstShow; @endphp @endif @endforeach
            </div>
        </div>
    </div>
</div>
@endsection