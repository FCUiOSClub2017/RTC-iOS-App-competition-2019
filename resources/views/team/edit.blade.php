@extends('layouts.app') @section('content')
<section class="pt-3">
    @if ($errors->any())
        <div class="row justify-content-center py-2">
            <div class="col-6 text-center text-danger h3 alert alert-danger">{{$errors->first()}}</div>
        </div>
    @endif
    <form method="post">
        @csrf
        <teamedit title="{{\App\TeamMember::levelText($level)}}" level="{{$level}}"></teamedit>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection