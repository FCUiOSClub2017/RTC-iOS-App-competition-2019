@extends('layouts.app') @section('content') 
<div class="container py-3">
    <div class="row">
        <div class="col">
            <div class="list-group">
            <a class="text-white list-group-item list-group-item-action active">已繳交檔案的組別</a>
                @foreach($users as $user)
                <a href="{{route('admin.team.qualifiers.app.download',$user)}}" class="list-group-item list-group-item-action">第{{$user}}組</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
