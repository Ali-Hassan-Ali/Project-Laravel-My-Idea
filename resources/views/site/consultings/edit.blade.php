@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @lang('consultings.consultings')
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.consultings.update', $consulting->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        {{--title--}}
                                        <div class="form-group">
                                            <label>@lang('ideas.title')<span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $consulting->title) }}" required autofocus>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--anser--}}
                                        <div class="form-group">
                                            <label>@lang('consultings.consulting')<span class="text-danger">*</span></label>
                                            <input type="text" name="anser" class="form-control @error('anser') is-invalid @enderror" value="{{ old('anser', $consulting->anser) }}" required autofocus>
                                            @error('anser')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- question --}}
                                        <div class="form-group">
                                            <label>@lang('consultings.question') <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('question') is-invalid @enderror" name="question" rows="6">{{ old('question', $consulting->question) }}</textarea>
                                            @error('question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--file--}}
                                        {{-- <div class="form-group">
                                            <label>@lang('ideas.file')<span class="text-danger">*</span></label>
                                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" required autofocus>
                                            @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                        {{--category_id--}}
                                        <div class="form-group @error('category_id') custom-select @enderror">
                                            <label>@lang('categorys.categorys') <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control select2" required>
                                                <option value="">@lang('site.choose') @lang('categorys.categorys')</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $consulting->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
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
