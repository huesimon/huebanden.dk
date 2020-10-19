@extends('layout')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Huebanden
        <small>Posts</small>
    </h1>

    @foreach ($posts as $post)

    <!-- Project One -->
    <div class="row">
        <div class="col-md-7">
            <a href="#">
                @if ($post->photos->isEmpty())
                <img class="img-fluid rounded mb-3 mb-md-0" src="https://placehold.it/700x300" alt="">
                @else
                <img style="width: 50%!important;" class=" img-fluid rounded mb-3 mb-md-0"
                    src="{{ $post->photos->first()->path }}" alt="">
                @endif

            </a>
        </div>
        <div class="col-md-5">
            <h3>{{ $post->title }}</h3>
            <p>
                {{ $post->body }}
            </p>
            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">View Post</a>
            @can('update', $post)
            <a class="btn btn-secondary" href="{{ route('posts.edit', $post) }}">Edit Post</a>
            @endcan
            @if (Auth::user()->hasLikedPost($post))
            <form action="{{ route('likes.destroy', Auth::user()->hasLikedPost($post))}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-outline-danger">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                    <span class="badge badge-light">{{ $post->likes->count() }}</span>
                    <span class="sr-only">Like</span>
                </button>
            </form>
            @else
            <form action="{{ route('likes.store')}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-outline-danger">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="grey"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                    <span class="badge badge-light">{{ $post->likes->count() }}</span>
                    <span class="sr-only">Like</span>
                </button>
            </form>
            @endif

        </div>
    </div>
    <!-- /.row -->

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