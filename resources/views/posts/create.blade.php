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
            <div class="col-md-12">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                            placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea type="text" class="form-control" id="body" name="body" placeholder="Body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">File</label>
                        <input type="file" class="form-control-file" name="photo" id="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
        <!-- /.row -->

        <hr>


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
