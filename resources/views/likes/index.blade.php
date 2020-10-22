@extends('layout')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Huebanden
        <small>Liked posts</small>
    </h1>

    @foreach ($likes as $like)
    <!-- Project One -->
    <div class="row">
        <div class="col-md-7">
            <a href="#">
                @if ($like->post->photos->isEmpty())
                <img class="img-fluid rounded mb-3 mb-md-0" src="https://placehold.it/700x300" alt="">
                @else
                <img style="width: 50%!important;" class=" img-fluid rounded mb-3 mb-md-0"
                    src="{{ $like->post->photos->first()->path }}" alt="">
                @endif

            </a>
        </div>
        <div class="col-md-5">
            <h3>{{ $like->post->title }}</h3>
            <p>
                {{ $like->post->body }}
            </p>
            <a class="btn btn-primary" href="{{ route('posts.show', $like->post) }}">View Post</a>
            @can('update', $like->post)
            <a class="btn btn-secondary" href="{{ route('posts.edit', $like->post) }}">Edit Post</a>
            @endcan

            @auth
            <div class="float-right">
                <form action="{{ route('likes.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-success"
                        {{ $post->LikedByUser(Auth::user()) ? "disabled":"true" }}>
                        Save
                    </button>
                </form>
            </div><br>
            @endauth

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