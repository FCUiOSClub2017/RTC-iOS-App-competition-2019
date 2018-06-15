@extends('layouts.app') @section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5 justify-content-center">
                        <div class="col-auto my-4">
                            <p class="text-primary h2">請前往信箱點擊驗證鏈接</p>
                            <p class="text-primary h3">沒有收到？
                                <a href="{{ route('verify.resend') }}" onclick="event.preventDefault();document.getElementById('verify-resend').submit();">重新發送驗證信</a>
                            </p>
                            <p class="text-primary h4">請於 15 分鐘內完成驗證</p>
                            <form id="verify-resend" action="{{ route('verify.resend') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection