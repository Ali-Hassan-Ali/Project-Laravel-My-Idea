@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Idea
                        <a href="{{ route('site.ideas.create') }}" class="mr-0">create</a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table class="table datatable" id="admins-table" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>@lang('categorys.category')</th>
                                            <th>@lang('ideas.description')</th>
                                            <th>@lang('ideas.title')</th>
                                            <th>@lang('ideas.views_count')</th>
                                            <th>@lang('ideas.likes')</th>
                                            <th>@lang('ideas.comments')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ideas as $idea)
                                            <tr>
                                                <td>{{ $idea->category->name }}</td>
                                                <td>{{ $idea->description }}</td>
                                                <td>{{ $idea->title }}</td>
                                                <td>{{ $idea->views_count }}</td>
                                                <td>{{ $idea->like->count() }}</td>
                                                <td>{{ $idea->comments->count() }}</td>
                                                <td>{{ $idea->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('site.ideas.edit', $idea->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                                    </a>
                                                    <a href="{{ route('site.ideas.show', $idea->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.show')
                                                    </a>
                                                    <form action="{{ route('site.ideas.destroy', $idea->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
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
