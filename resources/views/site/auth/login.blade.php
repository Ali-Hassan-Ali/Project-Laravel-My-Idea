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
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'User@gmail.com') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{--password--}}
                            <div class="form-group">
                                <label>@lang('admins.password')<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', '123123123') }}" required autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
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
