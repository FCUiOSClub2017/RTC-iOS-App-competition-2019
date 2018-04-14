@extends('layouts.app') @section('content')
<meta http-equiv="refresh" content="3;url={{route('team.info',[],false)}}" />
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5 justify-content-center text-center">
                        <div class="col-auto my-4">
                            <p class="text-primary h2">驗證完成，3 秒後轉跳至資料填寫！</p>
                            <p class="text-primary h2">若 3 秒後沒有轉跳
                                <a href="{{route('team.info',[],false)}}">點此！</a>
                            </p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection