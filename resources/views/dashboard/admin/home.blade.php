@extends('layout.dashboard.admin.app')

@section('content')

    <div>
        <h2>@lang('site.home')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">@lang('site.home')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            {{--top statistics--}}
            <div class="row" id="top-statistics">


            </div><!-- end of row -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

    </script>
    
@endpush