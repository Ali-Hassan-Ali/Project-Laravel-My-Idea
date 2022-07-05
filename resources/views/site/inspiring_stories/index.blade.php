@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <th>@lang('inspiring_stories.inspiring_stories')</th>
                        <a href="{{ route('site.inspiring_stories.create') }}" class="mr-0"><th>@lang('site.create')</th></a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table class="table datatable" id="admins-table" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>@lang('inspiring_stories.title')</th>
                                            <th>@lang('inspiring_stories.views_count')</th>
                                            <th>@lang('inspiring_stories.likes')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inspiring_stories as $stories)
                                            <tr>
                                                <td>{{ $stories->title }}</td>
                                                <td>{{ $stories->views_count }}</td>
                                                <td>{{ $stories->like->count() }}</td>
                                                <td>{{ $stories->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('site.inspiring_stories.edit', $stories->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                                    </a>
                                                    <a href="{{ route('site.inspiring_stories.show', $stories->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.show')
                                                    </a>
                                                    <form action="{{ route('site.inspiring_stories.destroy', $stories->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
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
