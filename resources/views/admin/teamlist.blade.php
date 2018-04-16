@extends('layouts.app') @section('content')
<section class="pt-3">
    <div class="container-fulid px-3">
        @if ($errors->any())
        <div class="row no-gutters justify-content-center py-2">
            <div class="col-6 text-center text-danger h3 alert alert-danger">{{$errors->first()}}</div>
        </div>
        @endif
        <div class="row no-gutters align-items-center text-center bg-primary text-white py-2">
            <div class="d-xl-none col-12">
                <a class="h4">隊伍列表</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">隊伍名稱</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">隊長</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">隊員1</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">隊員2</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">指導老師1</a>
            </div>
            <div class="d-none d-xl-block col-xl-2">
                <a class="h4">指導老師2</a>
            </div>
        </div>
        @foreach ($users as $user)
        <div class="row no-gutters align-items-center text-center pt-2">
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                <a class="h5 text-primary">{{$user->name}}</a>
                <br>
                <a class="h5 text-primary">{{$user->email}}</a>
            </div>
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                @if ($user->teamMemberGroupByLevel()->get(1))
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(1)->name}}</a>
                <br>
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(1)->email}}</a>
                <br>
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($user->teamMemberGroupByLevel()->get(1)->phone,"tw")->formatInternational()}}</a>
                @endif
            </div>
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                @if ($user->teamMemberGroupByLevel()->get(2))
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(2)->name}}</a>
                <br>
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(2)->email}}</a>
                <br>
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($user->teamMemberGroupByLevel()->get(2)->phone,"tw")->formatInternational()}}</a>
                @endif
            </div>
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                @if ($user->teamMemberGroupByLevel()->get(3))
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(3)->name}}</a>
                <br>
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(3)->email}}</a>
                <br>
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($user->teamMemberGroupByLevel()->get(3)->phone,"tw")->formatInternational()}}</a>
                @endif
            </div>
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                @if ($user->teamMemberGroupByLevel()->get(4))
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(4)->name}}</a>
                <br>
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(4)->email}}</a>
                <br>
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($user->teamMemberGroupByLevel()->get(4)->phone,"tw")->formatInternational()}}</a>
                @endif
            </div>
            <div class="col-12 col-sm-5 col-lg-4 col-xl-2 my-1">
                @if ($user->teamMemberGroupByLevel()->get(5))
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(5)->name}}</a>
                <br>
                <a class="h5">{{$user->teamMemberGroupByLevel()->get(5)->email}}</a>
                <br>
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($user->teamMemberGroupByLevel()->get(5)->phone,"tw")->formatInternational()}}</a>
                @endif {{-- @if ($user->phone!=null && $user->phone != "")
                <a class="h5">{{\Propaganistas\LaravelPhone\PhoneNumber::make($member->phone,"tw")->formatInternational()}}</a>
                @endif --}}
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection