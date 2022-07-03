@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Idea</div>

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
                                                <td>{{ $idea->comment->count() }}</td>
                                                <td>{{ $idea->created_at }}</td>
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
