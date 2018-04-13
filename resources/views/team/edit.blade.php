@extends('layouts.app') @section('content')
<section class="pt-3">
    <form method="post">
        @csrf
        <teamedit level="{{$level}}"></teamedit>
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