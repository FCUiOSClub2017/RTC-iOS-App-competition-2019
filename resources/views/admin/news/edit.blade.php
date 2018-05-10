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
<div class="container pt-3">
    <div class="row">
        <div class="col">
            {!! Form::open(['route' => 'news.save']) !!}
            <textarea name="content" class="form-control" id="ckeditor">{!! old("content", "內容在這邊") !!}</textarea>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <div id="ckeditor-preview">{!! old("content", "內容在這邊") !!}</div>
        </div>
    </div>
</div>
@endsection