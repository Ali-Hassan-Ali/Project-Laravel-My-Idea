@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        create group Idea | {{ $idea->title }}
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.ideas.groups.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        <input type="number" name="group_id" value="{{ $idea->id }}" hidden>

                                        {{--name--}}
                                        <div class="form-group">
                                            <label>@lang('ideas.name')<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                            @error('name')
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
