@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                {{ !empty($data->id) ? 'Edit' : 'Add' }} Candidate Comment
                            </div>
                            @if (!empty($data->id))
                                <div class="col-md-3 float-right">
                                    <a href="{{ route('candidate-comment.create') }}" class="btn btn-outline-primary">Add
                                        Candidate Comment</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form class="form-horizontal" name="candidateCommentForm" id="candidateCommentForm" method="post"
                        action="{{ !empty($data->id) ? route('candidate-comment.update', $data) : route('candidate-comment.store', ['candidate' => $candidate->id]) }}"
                        enctype="multipart/form-data">
                        {{ !empty($data->id) ? method_field('PUT') : method_field('POST') }}
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="comment" class="col-sm-3 col-form-label">Comment</label>
                                <div class="col-sm-8">
                                    <textarea name="comment" id="comment"
                                        class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" cols="30"
                                        rows="10">{{ old('comment', $data->comment) }}</textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="reset" class="btn btn-outline-warning float-end">Reset</button>
                                    <button type="submit" class="btn btn-outline-success float-end mx-2">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="headings d-flex justify-content-between align-items-center mb-3">
                        <h5>Candidate comments</h5>
                    </div>
                    {{-- <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg"
                                    width="30" class="user-img rounded-circle mr-2"> <span><small
                                        class="font-weight-bold text-primary">james_olesenn</small> <small
                                        class="font-weight-bold">Hmm, This poster looks cool</small></span> </div> <small>2
                                days ago</small>
                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            <div class="reply px-4"> <small>Remove</small> <span class="dots"></span>
                                <small>Reply</small> <span class="dots"></span> <small>Translate</small>
                            </div>
                            <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i
                                    class="fa fa-check-circle-o check-icon"></i> </div>
                        </div>
                    </div> --}}
                    @forelse ($candidateComments as $candidateComment)
                        <div class="card p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center">
                                    <span>
                                        <strong>{{ isset($candidateComment->commentUser) ? $candidateComment->commentUser->name : '' }}</strong>
                                    </span>
                                </div>
                                <small>{{ $candidateComment->updated_at->diffForHumans() }}</small>
                            </div>
                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                <div class="reply px-4">
                                    {{-- <small>{{ html_entity_decode($candidateComment->comment) }}</small> --}}
                                    {{-- <small>{!!strip_tags($candidateComment->comment)!!}</small> --}}
                                    <small>{{ $candidateComment->comment }}</small>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                    {{-- <div class="card p-3 mt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg"
                                    width="30" class="user-img rounded-circle mr-2"> <span><small
                                        class="font-weight-bold text-primary">olan_sams</small> <small
                                        class="font-weight-bold">Loving your work and profile! </small></span> </div>
                            <small>3 days ago</small>
                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            <div class="reply px-4"> <small>Remove</small> <span class="dots"></span>
                                <small>Reply</small> <span class="dots"></span> <small>Translate</small>
                            </div>
                            <div class="icons align-items-center"> <i
                                    class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                        </div>
                    </div>
                    <div class="card p-3 mt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/0LKZQYM.jpg"
                                    width="30" class="user-img rounded-circle mr-2"> <span><small
                                        class="font-weight-bold text-primary">rashida_jones</small> <small
                                        class="font-weight-bold">Really cool Which filter are you using? </small></span>
                            </div> <small>3 days ago</small>
                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            <div class="reply px-4"> <small>Remove</small> <span class="dots"></span>
                                <small>Reply</small> <span class="dots"></span> <small>Translate</small>
                            </div>
                            <div class="icons align-items-center"> <i class="fa fa-user-plus text-muted"></i> <i
                                    class="fa fa-star-o text-muted"></i> <i
                                    class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                        </div>
                    </div>
                    <div class="card p-3 mt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/ZSkeqnd.jpg"
                                    width="30" class="user-img rounded-circle mr-2"> <span><small
                                        class="font-weight-bold text-primary">simona_rnasi</small> <small
                                        class="font-weight-bold text-primary">@macky_lones</small> <small
                                        class="font-weight-bold text-primary">@rashida_jones</small> <small
                                        class="font-weight-bold">Thanks </small></span> </div> <small>3 days ago</small>
                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            <div class="reply px-4"> <small>Remove</small> <span class="dots"></span>
                                <small>Reply</small> <span class="dots"></span> <small>Translate</small>
                            </div>
                            <div class="icons align-items-center"> <i
                                    class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".alert-success").delay(5000).fadeOut("slow");
        });
    </script>
@endpush
