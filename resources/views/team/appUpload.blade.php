@extends('layouts.app') @section('content')
<section class="pt-3">
    {!! Form::open(['route' => 'team.app.uplaod','enctype'=>'multipart/form-data']) !!}
    <div class="container" id="teamAppUpload">
        @if ($errors->any())
        <div class="row justify-content-center py-2">
            <div class="col-6 text-center text-danger h3 alert alert-danger">{{$errors->first()}}</div>
        </div>
        @elseif (session()->has('msg'))
        <div class="row justify-content-center py-2">
            <div class="col-6 text-center text-success h3 alert alert-success">{{session()->get('msg')}}</div>
        </div>
        @endif
        <div class="row justify-content-center py-2">
            <div class="form-group col-12 col-md-6 col-xl-4">
                {!! Form::file('app',['class'=>'form-control py-2','id'=>'app','aria-describedby'=>'ProposalHelp','required'=>'true']) !!}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="container">
                    <div class="row justify-content-around py-2">
                        <button class="col-auto btn btn-primary" type="submit">上傳</button>
                        <a class="btn col-auto" type="submit" href="{{route('team.app.download')}}">下載</a>
                    </div>
                    <div class="row justify-content-around py-2">
                        <div class="col-12">
                            <a>請於 {{Carbon::parse(Setting::get('app_upload_deadline', '2019-7-26'), 'Asia/Taipei')->toDateTimeString()}} 前繳交App作品，作品應包含可在移動裝置中運行的應用程式，包含 APP 操作過程影片檔、現場簡報檔、 SOURCE CODE 及 APP 宣傳文件，進入決賽公布後，參賽隊伍可對作品進行優化，但不能變更作品主題和內容，並根據決賽要求提供最終作品，參賽作品以提交截止日期前提交的最後一版為準。</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</section>
@endsection