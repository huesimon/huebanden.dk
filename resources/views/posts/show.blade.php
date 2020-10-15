@extends('layout')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Huebanden
            <small>Posts</small>
        </h1>

        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                @foreach ($post->photos as $photo)
                    <img style="width: 100%!important;" src="{{ asset($photo->path) }}">
                @endforeach
            </div>
            <div class="col-md-5">
                <h3>{{ $post->title }}</h3>
                <p>
                    {{ $post->body }}
                </p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" id="text" name="text" placeholder="Comment"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>

        <hr>
        @foreach ($comments as $comment)

            <div class="row">
                <div class="col-md-2">
                    {{ $comment->user->name }}
                </div>
                <div class="col-md-8">
                    {{ $comment->text }}
                </div>
                <div class="col-md-2">
                    {{ $comment->created_at->format('d-m-Y') }}
                </div>
            </div>
            <hr>

        @endforeach

        <!-- Pagination -->
        {{-- <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul> --}}
    </div>
    <!-- /.container -->
@endsection
