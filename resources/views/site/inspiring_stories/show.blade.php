@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        inspiring_storie show | {{ $inspiring_storie->title }}
                    </div>

                    <div class="card-body">

                        <section>
                          <div class="container">
                            <div class="row d-flex justify-content-center">
                              <div class="col-12">
                                <div class="">
                                  <div class="">
                                 {{--    <div class="d-flex flex-start align-items-center">
                                      <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                        height="60" />
                                      <div>
                                        <h6 class="fw-bold text-primary mb-1">{{ $inspiring_storie->user->name }}</h6>
                                        <p class="text-muted small mb-0">
                                          Shared publicly - {{ $inspiring_storie->created_at }}
                                        </p>
                                      </div>
                                    </div> --}}

                                    {{-- <p class="mt-3"> --}}
                                      {{-- <strong>{{ $inspiring_storie->title }}</strong> --}}
                                    {{-- </p> --}}

                                    <p class="mb-4 pb-2">
                                      <h3>{{ $inspiring_storie->title }}</h3>
                                    </p>

                                    <p class="mt-3 mb-4 pb-2">
                                      {{ $inspiring_storie->description }}
                                    </p>

                                    <div class="small d-flex justify-content-start">

                                      <a href="{{ route('site.inspiring_storie.like.store', $inspiring_storie->id) }}" class="d-flex align-items-center me-3">
                                          <i class="fa fa-thumbs-up me-2"></i>
                                          <p class="mb-0">Like {{ $inspiring_storie->like->count() }}</p>
                                      </a>
                                      {{-- <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="fa fa-share me-2"></i>
                                        <p class="mb-0">Share</p>
                                      </a> --}}
                                      <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="fa fa-eye me-2"></i>
                                        <p class="mb-0">viws {{ $inspiring_storie->views_count }}</p>
                                      </a>
                                    </div>
                                  </div>


                                </div>
                              </div>
                            </div>
                          </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
