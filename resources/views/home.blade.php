@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">

                        <h3>@lang('settings.vision')</h3>
                        <p>{{ setting('vision') }}</p>

                    </div>

                    <div class="card-body">

                        <h3>@lang('settings.the_message')</h3>
                        <p>{{ setting('the_message') }}</p>

                    </div>

                    <div class="card-body">

                        <h3>@lang('settings.objectives')</h3>
                        <p>{{ setting('objectives') }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
