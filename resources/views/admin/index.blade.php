@extends('layouts.app') @section('content') 
<div class="container py-3">
    <div class="row">
        <div class="col">
            <div class="list-group">
                <a class="text-white list-group-item list-group-item-action active">功能列表</a>
                <a href="{{route('admin.news.index')}}" class="list-group-item list-group-item-action">最新消息管理</a>
                <a href="{{route('admin.team.list')}}" class="list-group-item list-group-item-action">隊伍列表</a>
                <a href="{{route('admin.team.qualifiers.app.list')}}" class="list-group-item list-group-item-action">初賽隊伍APP檔案下載列表</a>
                <a class="text-white list-group-item list-group-item-action active">下載專區</a>
                <a href="{{route('admin.team.list.download')}}" class="list-group-item list-group-item-action">隊伍列表</a>
                <a href="{{route('admin.team.document.download')}}" class="list-group-item list-group-item-action">隊伍檔案</a>
                <a href="{{route('admin.team.qualifiers.download')}}" class="list-group-item list-group-item-action">進入初賽隊伍檔案(全部)</a>
                <a href="{{route('admin.team.qualifiers.form.download')}}" class="list-group-item list-group-item-action">進入初賽隊伍檔案(報名資料)</a>
                <a class="text-white list-group-item list-group-item-action active">時限專區</a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    @php $randomStr = str_random(10); @endphp
                    {!! Form::open(['route' => 'admin.config.status.news','onSubmit'=>"axios.post(this.action).then((response)=>{\$('#$randomStr').text(response.data.date?'是':'否')});return false;"]) !!}
                    <div class="row justify-content-between align-items-center">
                        <div class="col">顯示最新消息： <span id="{{$randomStr}}">{{Setting::get('active_news', false)?"是":"否"}}</span></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary bootstrap-original">Toggle</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    @php $randomStr = str_random(10); @endphp
                    {!! Form::open(['route' => 'admin.config.deadline.register','onSubmit'=>"axios.post(this.action,{date:this.date.value}).then((response)=>{\$('#$randomStr').text(response.data.date)});return false;"]) !!}
                    <div class="row justify-content-between align-items-center">
                        <div class="col">註冊截止時間： <span id="{{$randomStr}}">{{Setting::get('register_deadline',"2019-05-15 23:59:59")}}</span></div>
                        <div class="col-auto">
                            <datepicker :value="new Date('{{Setting::get('register_deadline',"2019-05-15 23:59:59")}}')" :bootstrap-styling="true" name="date"></datepicker>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary bootstrap-original">Apply</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    @php $randomStr = str_random(10); @endphp
                    {!! Form::open(['route' => 'admin.config.deadline.proposal','onSubmit'=>"axios.post(this.action,{date:this.date.value}).then((response)=>{\$('#$randomStr').text(response.data.date)});return false;"]) !!}
                    <div class="row justify-content-between align-items-center">
                        <div class="col">企劃書上傳截止時間： <span id="{{$randomStr}}">{{Setting::get('proposal_deadline',"2019-06-10 23:59:59")}}</span></div>
                        <div class="col-auto">
                            <datepicker :value="new Date('{{Setting::get('proposal_deadline',"2019-06-10 23:59:59")}}')" :bootstrap-styling="true" name="date"></datepicker>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary bootstrap-original">Apply</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    @php $randomStr = str_random(10); @endphp
                    {!! Form::open(['route' => 'admin.config.deadline.register.form','onSubmit'=>"axios.post(this.action,{date:this.date.value}).then((response)=>{\$('#$randomStr').text(response.data.date)});return false;"]) !!}
                    <div class="row justify-content-between align-items-center">
                        <div class="col">報名資料補繳截止時間： <span id="{{$randomStr}}">{{Setting::get('register_form_deadline',"2019-06-30 23:59:59")}}</span></div>
                        <div class="col-auto">
                            <datepicker :value="new Date('{{Setting::get('register_form_deadline',"2019-06-29 23:59:59")}}')" :bootstrap-styling="true" name="date"></datepicker>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary bootstrap-original">Apply</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    @php $randomStr = str_random(10); @endphp
                    {!! Form::open(['route' => 'admin.config.deadline.app','onSubmit'=>"axios.post(this.action,{date:this.date.value}).then((response)=>{\$('#$randomStr').text(response.data.date)});return false;"]) !!}
                    <div class="row justify-content-between align-items-center">
                        <div class="col">App 上傳截止時間： <span id="{{$randomStr}}">{{Setting::get('app_upload_deadline',"2019-07-26 23:59:59")}}</span></div>
                        <div class="col-auto">
                            <datepicker :value="new Date('{{Setting::get('app_upload_deadline',"2019-07-26 23:59:59")}}')" :bootstrap-styling="true" name="date"></datepicker>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary bootstrap-original">Apply</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
