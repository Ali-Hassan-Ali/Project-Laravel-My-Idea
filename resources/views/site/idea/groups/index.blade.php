@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Idea
                        <a href="{{ route('site.ideas.index') }}" class="mr-0">show / </a>
                        <a href="{{ route('site.ideas.groups.create', $idea->id) }}" class="mr-0">create group</a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table class="table datatable" id="admins-table" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>@lang('ideas.name')</th>
                                            <th>@lang('ideas.count_user')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($idea->groups as $group)
                                            <tr>
                                                <td>{{ $group->name }}</td>
                                                <td>{{ $group->group_ideas->count() }}</td>
                                                <td>{{ $group->created_at }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('site.ideas.groups.show', $idea->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.show')
                                                    </a> --}}
                                                    <a href="{{ route('site.ideas.groups.join', $group->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eys"></i> @lang('site.join')
                                                    </a>
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
