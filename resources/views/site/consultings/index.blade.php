@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <th>@lang('consultings.consultings')</th>
                        <a href="{{ route('site.consultings.create') }}" class="mr-0"><th>@lang('site.create')</th></a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table class="table datatable" id="admins-table" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>@lang('consultings.name')</th>
                                            <th>@lang('categorys.category')</th>
                                            <th>@lang('consultings.title')</th>
                                            <th>@lang('consultings.views_count')</th>
                                            <th>@lang('consultings.likes')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($consultings as $consulting)
                                            <tr>
                                                <td>{{ $consulting->user->name }}</td>
                                                <td>{{ $consulting->category->name }}</td>
                                                <td>{{ $consulting->title }}</td>
                                                <td>{{ $consulting->views_count }}</td>
                                                <td>{{ $consulting->like->count() }}</td>
                                                <td>{{ $consulting->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('site.consultings.edit', $consulting->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                                    </a>
                                                    <a href="{{ route('site.consultings.show', $consulting->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.show')
                                                    </a>
                                                    <form action="{{ route('site.consultings.destroy', $consulting->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
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
