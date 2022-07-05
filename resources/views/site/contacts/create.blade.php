@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @lang('contacts.contacts')
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="tile">

                                    <form method="post" action="{{ route('site.contacts.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        {{--name--}}
                                        <div class="form-group">
                                            <label>@lang('contacts.name')<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        @php
                                            $guards = ['اقتراحات', 'شكاوي', 'استفسارات'];
                                            $models = ['صفحه الافكار', 'صفحه كيف تفكر', 'صفحه الاستشارات','صفحة قصص ملهمة'];
                                        @endphp

                                        {{--guard--}}
                                        <div class="form-group @error('guard') custom-select @enderror">
                                            <label>@lang('contacts.guard') <span class="text-danger">*</span></label>
                                            <select name="guard" class="form-control select2" required>
                                                <option value="">@lang('site.choose') @lang('contacts.guard')</option>
                                                @foreach ($guards as $guard)
                                                    <option value="{{ $guard }}" {{ $guard == old('guard') ? 'selected' : '' }}>{{ $guard }}</option>
                                                @endforeach
                                            </select>
                                            @error('guard')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--model--}}
                                        <div class="form-group mt-3 @error('model') custom-select @enderror">
                                            {{-- <label>@lang('contacts.model') <span class="text-danger">*</span></label> --}}
                                            <select name="model" class="form-control select2" required>
                                                <option value=""></option>
                                                @foreach ($models as $model)
                                                    <option value="{{ $model }}" {{ $model == old('model') ? 'selected' : '' }}>{{ $model }}</option>
                                                @endforeach
                                            </select>
                                            @error('model')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        {{--subject--}}
                                        <div class="form-group">
                                            <label>@lang('contacts.subject')<span class="text-danger">*</span></label>
                                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required autofocus>
                                            @error('subject')
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
