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

                <div class="col-md-4 mb-2">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-2">
                                <p class="mb-0"><span class="fa fa-lock"></span> @lang('roles.roles')</p>
                                <a href="">@lang('site.show_all')</a>
                            </div>

                            <div class="loader loader-sm"></div>

                            <h3 class="mb-0" id="roles-count" style="display: none"></h3>
                        </div>

                    </div>

                </div><!-- end of col -->

                <div class="col-md-4 mb-2">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-2">
                                <p class="mb-0"><span class="fa fa-users"></span> @lang('admins.admins')</p>
                                <a href="">@lang('site.show_all')</a>
                            </div>

                            <div class="loader loader-sm"></div>

                            <h3 class="mb-0" id="admins-count" style="display: none;"></h3>
                        </div>

                    </div>

                </div><!-- end of col -->

                <div class="col-md-4 mb-2">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-2">
                                <p class="mb-0"><span class="fa-solid fa-flag"></span> @lang('countrys.countrys')</p>
                                <a href="">@lang('site.show_all')</a>
                            </div>

                            <div class="loader loader-sm"></div>

                            <h3 class="mb-0" id="countrys-count" style="display: none;"></h3>
                        </div>

                    </div>

                </div><!-- end of col -->

                <div class="col-md-4 mb-2">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-2">
                                <p class="mb-0"><span class="fa-solid fa-city"></span> @lang('citys.citys')</p>
                                <a href="">@lang('site.show_all')</a>
                            </div>

                            <div class="loader loader-sm"></div>

                            <h3 class="mb-0" id="citys-count" style="display: none"></h3>
                        </div>

                    </div>

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

    </script>
    
@endpush