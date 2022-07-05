@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        group name | {{ $group->name }} <br>
                        group users | {{ $group->group_ideas->count() }}
                    </div>

                    <div class="card-body">

                        @foreach ($group->chats as $chat)
                            @if ($chat->user_id == auth()->id())
                                <div class="alert alert-dark" role="alert">
                                    <h4 class="alert-heading">{{ $chat->user->name }}</h4>
                                    {{ $chat->message }}
                                </div>
                            @else
                                <div class="alert alert-primary" role="alert">
                                    <h4 class="alert-heading">{{ $chat->user->name }}</h4>
                                    {{ $chat->message }}
                                </div>
                                <br>
                            @endif
                        @endforeach

                        <div class="col-md-12">

                            <div class="tile">

                                <form method="post" action="{{ route('site.ideas.groups.chat.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <input type="number" value="{{ $group->id }}" name="group_id" hidden>

                                    {{--message--}}
                                    <div class="form-group">
                                        <label>@lang('ideas.message')<span class="text-danger">*</span></label>
                                        <input type="text" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" required autofocus>
                                        @error('message')
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
