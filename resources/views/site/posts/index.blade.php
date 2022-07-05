@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        post
                        <a href="{{ route('site.posts.create') }}" class="mr-0">create</a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table class="table datatable" id="admins-table" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>@lang('posts.title')</th>
                                            <th>@lang('posts.views_count')</th>
                                            <th>@lang('posts.likes')</th>
                                            <th>@lang('posts.comments')</th>
                                            <th>@lang('posts.image')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->views_count }}</td>
                                                <td>{{ $post->like->count() }}</td>
                                                <td>{{ $post->comments->count() }}</td>
                                                <td><img src="{{ $post->image_path }}" width="60"></td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('site.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                                    </a>
                                                    <a href="{{ route('site.posts.show', $post->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.show')
                                                    </a>
                                                    <form action="{{ route('site.posts.destroy', $post->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div><!-- end of table responsive -->

                            </div><!-- end of col -->

                        </div><!-- end of row -->


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
