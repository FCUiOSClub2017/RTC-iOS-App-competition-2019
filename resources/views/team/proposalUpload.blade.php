@extends('layouts.app') @section('content')
<section class="pt-3">
    {!! Form::open(['route' => 'team.proposal.uplaod','enctype'=>'multipart/form-data']) !!}
    <div class="container">
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
                {!! Form::file('proposal',['class'=>'form-control py-2','id'=>'proposal','aria-describedby'=>'ProposalHelp','required'=>'true']) !!}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="container">
                    <div class="row justify-content-around py-2">
                        <button class="col-auto btn btn-primary" type="submit">上傳</button>
                        <a class="btn col-auto" type="submit" href="{{route('team.proposal.download')}}">下載</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</section>
@endsection