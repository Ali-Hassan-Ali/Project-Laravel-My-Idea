@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">

                        <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            {{--email--}}
                            <div class="form-group">
                                <label>@lang('admins.email')<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @if(session('email')) is-invalid @endif @error('email') is-invalid @enderror" value="{{ old('email', 'User@gmail.com') }}" required autofocus>
                                @if(session('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('email') }}</strong>
                                    </span>
                                @endif
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{--password--}}
                            <div class="form-group">
                                <label>@lang('admins.password')<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @if(session('password')) is-invalid @endif" value="{{ old('password', '123123123') }}" required autofocus>
                                @if(session('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- remember me --}}
                            <div class="form-group">
                                <div class="utility">
                                    <div class="animated-checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text"> {{ __('Remember Me') }}</span>
                                        </label>
                                    </div>
                                    <p class="semibold-text mb-2 m-2"><a href="#" data-toggle="flip"> Forgot Password ?</a></p>
                                </div>{{-- utility --}}
                            </div>{{-- form-group --}}
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary col-12"><i class="fa fa-plus"></i>@lang('site.create')</button>
                            </div>

                        </form><!-- end of form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
