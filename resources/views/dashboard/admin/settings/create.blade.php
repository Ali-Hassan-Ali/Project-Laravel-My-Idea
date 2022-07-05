@extends('layout.dashboard.admin.app')

@section('content')

    <div>
        <h2>@lang('settings.settings')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.settings')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('dashboard.admin.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    {{--logo--}}
                    <div class="form-group">
                        <label>@lang('settings.logo')</label>
                        <input type="file" name="logo" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/' . setting('logo')) }}" class="loaded-image" alt="" style="display: {{ setting('logo') ? 'block' : 'none' }}; width: 100px; margin: 10px 0;">
                    </div>

                    {{--fav_icon--}}
                    <div class="form-group">
                        <label>@lang('settings.fav_icon')</label>
                        <input type="file" name="fav_icon" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/' . setting('fav_icon')) }}" class="loaded-image" alt="" style="display: {{ setting('fav_icon') ? 'block' : 'none' }}; width: 50px; margin: 10px 0;">
                    </div>

                    {{--title--}}
                    <div class="form-group">
                        <label>@lang('settings.title')</label>
                        <input type="text" name="title" class="form-control" value="{{ setting('title') }}">
                    </div>

                    {{--vision--}}
                    <div class="form-group">
                        <label>@lang('settings.vision')</label>
                        <input type="text" name="vision" class="form-control" value="{{ setting('vision') }}">
                    </div>

                    {{--the_message--}}
                    <div class="form-group">
                        <label>@lang('settings.the_message')</label>
                        <textarea name="the_message" class="form-control">{{ setting('the_message') }}</textarea>
                    </div>

                    {{--objectives--}}
                    <div class="form-group">
                        <label>@lang('settings.objectives')</label>
                        <textarea name="objectives" class="form-control">{{ setting('objectives') }}</textarea>
                    </div>

                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection