@extends('layouts.app') @section('head')
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
<script>
var options = {
    filebrowserImageBrowseUrl: '{{config("lfm.url_prefix")}}?type=Images',
    filebrowserImageUploadUrl: '{{config("lfm.url_prefix")}}/upload?type=Images&responseType=json&_token=' + $('meta[name="csrf-token"]').attr('content'),
    filebrowserBrowseUrl: '{{config("lfm.url_prefix")}}?type=Files',
    filebrowserUploadUrl: '{{config("lfm.url_prefix")}}/upload?type=Files&responseType=json&_token=' + $('meta[name="csrf-token"]').attr('content')
};
$(document).ready(function() {
    var editor = CKEDITOR.replace('ckeditor', options);
    CKEDITOR.config.language = 'zh-tw';
    editor.on('change', function(evt) {
        // getData() returns CKEditor's HTML content.
        console.log('Total bytes: ' + evt.editor.getData().length);
        $('#ckeditor-preview').html(evt.editor.getData())
    });
});
</script>
@endsection @section('content')
<div class="container pt-3 bootstrap-original">
    <div class="row pb-3 justify-content-between">
        <div class="col-auto">
            <a class="btn bootstrap-original btn-primary" href="{{route('admin.news.index')}}">返回列表</a>
        </div>
        <div class="col-auto">
            <a class="btn bootstrap-original btn-success" href="{{route('admin.news.edit')}}">新消息</a>
        </div>
    </div>
    {!! Form::open(['route' => ['admin.news.save',$id]]) !!}
    <div class="row">
        <div class="col-2">
            <datepicker :value="new Date({{old('year',$year)}},{{old('month',$month)}},{{old('day',$day)}})" name="date" :minimum-view="'day'" :maximum-view="'day'" :bootstrap-styling="true">
                <div slot="beforeCalendarHeader" class="calender-header">
                    Choose a Date
                </div>
            </datepicker>
        </div>
        <div class="col">
            <input type="text" name="title" value="{{old('title',$title)}}" placeholder="標題">
        </div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <textarea name="content" class="form-control" id="ckeditor">{!! old("content", $content) !!}</textarea>
        </div>
    </div>
    {!! Form::close() !!} @php $randomStr1 = str_random(10); $randomStr2 = str_random(10); @endphp
    <div class="row pt-3 bootstrap-original">
        <div class="col">
            <div id="news" class="shadow rounded">
                @component('components.admin.news.card') @slot('title') {{old("title", $title)}} @endslot @slot('content',old("content", $content)) @slot('route',route('admin.news.edit',$id)) @slot('parent','news') @slot('firstShow',true) @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection