@extends('layout.dashboard.admin.app')

@section('content')

    <div>
        <h2>@lang('posts.posts')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.posts.index') }}">@lang('posts.posts')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('dashboard.admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('put')

                    {{--title--}}
                    <div class="form-group">
                        <label>@lang('posts.title')<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- body --}}
                    <div class="form-group">
                        <label>@lang('posts.body') <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6">{{ old('body', $post->body) }}</textarea>
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


