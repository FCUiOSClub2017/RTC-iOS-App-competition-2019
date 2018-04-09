@extends('layouts.app') @section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary h2 text-white">{{ __('登入') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('電子郵件') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('密碼') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('記住我（公用設備請勿勾選）') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-right">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登入') }}
                                </button>
                            </div>
                            <div class="col-md-8 offset-md-4 mt-2">
                                <span> 沒有帳號？ <a href="{{ route('register') }}">{{ __('點我註冊！') }}</a></span>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <span> 忘記密碼？ <a href="{{ route('password.request') }}">{{ __('點我取回密碼！') }}</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection