@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        post
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.posts.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        {{--title--}}
                                        <div class="form-group">
                                            <label>@lang('posts.title')<span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autofocus>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- body --}}
                                        <div class="form-group">
                                            <label>@lang('posts.body') <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6">{{ old('body') }}</textarea>
                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--image--}}
                                        <div class="form-group">
                                            <label>@lang('posts.image')<span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" autofocus>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary col-12"><i class="fa fa-plus"></i>@lang('site.create')</button>
                                        </div>

                                    </form><!-- end of form -->

                                </div><!-- end of tile -->

                            </div><!-- end of col -->

                        </div><!-- end of row -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
