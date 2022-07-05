@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @lang('inspiring_stories.inspiring_stories')
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.inspiring_storie.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        {{--title--}}
                                        <div class="form-group">
                                            <label>@lang('ideas.title')<span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autofocus>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- description --}}
                                        <div class="form-group">
                                            <label>@lang('inspiring_stories.description') <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group mt-3">
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
