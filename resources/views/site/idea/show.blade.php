@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        Idea show | {{ $idea->title }}
                    </div>

                    <div class="card-body">

                        <section>
                          <div class="container">
                            <div class="row d-flex justify-content-center">
                              <div class="col-12">
                                <div class="">
                                  <div class="">
                                    <div class="d-flex flex-start align-items-center">
                                      <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                        height="60" />
                                      <div>
                                        <h6 class="fw-bold text-primary mb-1">{{ $idea->user->name }}</h6>
                                        <p class="text-muted small mb-0">
                                          Shared publicly - {{ $idea->created_at }}
                                        </p>
                                      </div>
                                    </div>

                                    <p class="mt-3">
                                      <strong>{{ $idea->title }}</strong>
                                    </p>

                                    <p class="mt-3 mb-4 pb-2">
                                      {{ $idea->description }}
                                    </p>

                                    <div class="small d-flex justify-content-start">
                                      <a href="{{ route('site.ideas.like.store', $idea->id) }}" class="d-flex align-items-center me-3">
                                        <i class="fa fa-thumbs-up me-2"></i>
                                        <p class="mb-0">Like {{ $idea->like->count() }}</p>
                                      </a>
                                      <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="fa fa-comment me-2"></i>
                                        <p class="mb-0">Comment {{ $idea->comments->count() }}</p>
                                      </a>
                                      <a href="{{ route('site.ideas.groups.index', $idea->id) }}" class="d-flex align-items-center me-3">
                                        <i class="fa fa-users me-2"></i>
                                        <p class="mb-0">groups {{ $idea->groups->count() }}</p>
                                      </a>
                                      {{-- <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="fa fa-share me-2"></i>
                                        <p class="mb-0">Share</p>
                                      </a> --}}
                                      <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="fa fa-eye me-2"></i>
                                        <p class="mb-0">viws {{ $idea->views_count }}</p>
                                      </a>
                                    </div>
                                  </div>
                                  <div class="card-footer py-5 mt-2 border-0" style="background-color: #f8f9fa;">
                                        <form method="post" action="{{ route('site.ideas.comment') }}">
                                            @csrf
                                            @method('post')

                                            <input type="number" name="idea_id" value="{{ $idea->id }}" hidden>

                                            <div class="d-flex flex-start w-100">
                                              <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                                                height="40" />
                                                <div class="form-outline w-100">
                                                    <textarea class="form-control" name="message" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                    <label class="form-label" for="textAreaExample">comment</label>
                                                </div>
                                            </div>
                                            <div class="float-end mt-2">
                                                <button type="submit" class="btn btn-primary btn-sm">comment</button>
                                                <a href="{{ url('/home') }}" class="btn btn-outline-primary btn-sm">Cancel</a>
                                            </div>
                                        </form>
                                    </div>

                                    @foreach ($idea->comments as $comment)
                                        
                                        <div class="card-footer mt-2 py-3 border-2" style="background-color: #dd;">
                                            <input type="number" name="idea_id" value="{{ $idea->id }}" hidden>

                                            <div class="d-flex flex-start w-100">
                                              <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                                                height="40" />
                                                <div class="form-outline w-100">
                                                    <p>{{ $comment->message }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach


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
