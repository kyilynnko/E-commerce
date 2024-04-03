@extends('layout.master')

@section('Title','Category Create')

@section('content')

    <div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>

        <div class="col-md-8 offset-md-2">
            <!-- form start -->
            <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="row justify-content-end no-gutters mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
               </div>
            </form>
            <!-- form end -->
        </div>
    </div>

@endsection


