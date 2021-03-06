@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Idea
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.ideas.store') }}" enctype="multipart/form-data">
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
                                            <label>@lang('ideas.description') <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--file--}}
                                        <div class="form-group">
                                            <label>@lang('ideas.file')<span class="text-danger">*</span></label>
                                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" required autofocus>
                                            @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--equipment_id--}}
                                        <div class="form-group @error('category_id') custom-select @enderror">
                                            <label>@lang('categorys.categorys') <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control select2" required>
                                                <option value="">@lang('site.choose') @lang('categorys.categorys')</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == old('equipment_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--source--}}
                                        <div class="form-group">
                                            <label>@lang('ideas.source')<span class="text-danger">*</span></label>
                                            <input type="text" name="source" class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}" required autofocus>
                                            @error('source')
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
