@extends('layouts.app')

@section('content')
<div class="container">
<div align = "center"><img src="{{ asset('img/logo_blue.png') }}" width="120" height="120"></div>
<br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                

                <div class="card-header" align = "center"><h4>{{ __('ระบบสำรวจความคิดเห็นทางอิเล็กทรอนิกส์') }}</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        
                        <!-- <input type="hidden" name='ip' value="{{ $ip = $_SERVER['REMOTE_ADDR'] }}"/> -->
                        <!-- <input type="hidden" name='date' value="{{ date('Y-m-d H:i:s') }}"/> -->
                        

                        <div class="form-group row">
                            <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail or Username') }}</label> -->
                            <label for="username" class="col-md-4 col-form-label text-md-right"><h5>{{ __('อีเมลหรือรหัสผู้ใช้งาน') }}</h5></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('email') is-invalid @enderror || form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <!-- <strong>{{ $message }}</strong> -->
                                        <strong>รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</strong>
                                    </span>
                                @enderror

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <!-- <strong>{{ $message }}</strong> -->
                                        <strong>รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                            <label for="password" class="col-md-4 col-form-label text-md-right"><h5>{{ __('รหัสผ่าน') }}</h5></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
