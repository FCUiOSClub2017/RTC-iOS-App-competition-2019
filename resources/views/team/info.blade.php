@extends('layouts.app') @section('content')
<section class="pt-3">
    <div class="container">
        <div class="row text-center bg-primary text-white py-2">
            <div class="d-lg-none col-12">
                <a class="h4">參賽資料</a>
            </div>
            <div class="d-none d-lg-block col-lg-1">
                <a class="h4">職位</a>
            </div>
            <div class="d-none d-lg-block col-lg-2">
                <a class="h4">學校 - 學系</a>
            </div>
            <div class="d-none d-lg-block col-lg-2">
                <a class="h4">名字</a>
            </div>
            <div class="d-none d-lg-block col-lg-3">
                <a class="h4">Email</a>
            </div>
            <div class="d-none d-lg-block col-lg-2">
                <a class="h4">手機號碼</a>
            </div>
            @if (Carbon\Carbon::now()
            <Carbon\Carbon::create(2018, 5, 8, 23, 59, 59, 'Asia/Taipei')) <div class="d-none d-lg-block col-lg-2">
                <a class="h4">操作</a>
        </div>
        @endif
    </div>
    @foreach ($team as $member)
    <div class="row text-center align-items-center mt-3">
        <div class="col-12 col-sm-5 col-lg-1 my-1">
            <a class="h5">{{\App\TeamMember::levelText($member->level)}}</a>
        </div>
        <div class="col-12 col-sm-5 col-lg-2 my-1">
            <a class="h5">{{$member->univercity?$member->univercity->name:null}}
                <br>{{$member->univercity?$member->univercity->course:null}}</a>
        </div>
        <div class="col-12 col-sm-5 col-lg-2 my-1">
            <a class="h5">{{$member->name}}</a>
        </div>
        <div class="col-12 col-sm-5 col-lg-3 my-1">
            <a class="h5">{{$member->email}}</a>
        </div>
        <div class="col-12 col-sm-5 col-lg-2 my-1">
            @if ($member->phone!=null && $member->phone != "")
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($member->phone,"tw")->formatInternational()}}</a>
            @endif
        </div>
        @if (Carbon\Carbon::now()
        <Carbon\Carbon::create(2018, 5, 8, 23, 59, 59, 'Asia/Taipei')) <div class="col-12 col-sm-5 col-lg-2 my-1">
            <div class=" text-white btn-group" role="group" aria-label="Basic example">
                <a class="p-3 btn btn-primary" href="{{ route('team.edit',['level'=>$member->level]) }}">修改</a>
                <a class="p-3 btn bg-danger" href="{{ route('team.clear',['level'=>$member->level]) }}" onclick="event.preventDefault();document.getElementById('clear_team_member_data').submit();">清除</a>
            </div>
            <form id="clear_team_member_data" action="{{ route('team.clear',['level'=>$member->level]) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
            </form>
    </div>
    @endif
    </div>
    @endforeach
    </div>
</section>
@endsection