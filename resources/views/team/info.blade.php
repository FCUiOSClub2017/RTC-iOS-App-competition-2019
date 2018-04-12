@extends('layouts.app')
@section('content')
<section class="pt-3">
<div class="container">
    <div class="row text-center">
        <div class="col-2">職位</div>
        <div class="col-2">學校</div>
        <div class="col-2">學系</div>
        <div class="col-2">名字</div>
        <div class="col-2">Email</div>
        <div class="col-2">手機號碼</div>
    </div>
@foreach ($team as $member)
    <div class="row text-center">
        <div class="col-2">{{$member->level_label()}}</div>
        <div class="col-2">{{$member->univercity->name}}</div>
        <div class="col-2">{{$member->univercity->course}}</div>
        <div class="col-2">{{$member->name}}</div>
        <div class="col-2">{{$member->email}}</div>
        <div class="col-2">{{$member->phone}}</div>
    </div>
@endforeach
</div>
</section>
@endsection
