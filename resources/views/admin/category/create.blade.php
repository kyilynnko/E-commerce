@extends('layout.master')

@section('Title','Category Create')

@section('content')
    <style>
        .pagination > li{
            padding: 5px 15px;
            background: #ddd;
            margin-right: 1px;
        }
        #edit_cat{
            cursor: pointer;
        }
    </style>

    <div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>

        <div class="row">
            <div class="col-md-4">
                @include('layout.admin_sidebar')
            </div>

            <div class="col-md-8">
                @include('layout.report_message')

                @if(\App\Classes\Session::has("delete_success"))
                    {{\App\Classes\Session::flash("delete_success")}}
                @endif

                @if(\App\Classes\Session::has("delete_fail"))
                    {{\App\Classes\Session::flash("delete_fail")}}
                @endif

                <!-- form start -->
                <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <div class="row justify-content-end no-gutters mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </form>
                <!-- form end -->
                <ul class="list-group mt-5">
                    @foreach($cats as $cat)
                        <li class="list-group-item">
                            <a href="/admin/category/all">{{$cat->name}}</a>
                            <span class="float-right">
                                <i class="fa fa-plus text-primary" style="cursor: pointer;" onclick="showSubCatModel('{{$cat->name}}','{{$cat->id}}')"></i>
                                <i class="fa fa-edit text-warning pl-2" id="edit_cat" onclick="fun('{{$cat->name}}','{{$cat->id}}')"></i>
                                <a href="/admin/category/{{$cat->id}}/delete"> 
                                    <i class="fa fa-trash text-danger pl-2"></i>
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-5"></div>
                {!!$pages!!}
            </div>
        </div>    
    </div>

    <!-- Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="CatUpdateModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="edit_name">
                        </div>
                        <input type="hidden" id="edit_token" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row justify-content-end no-gutters mt-3">
                            <button class="btn btn-primary btn-sm" onclick="startEdit(event)">Update</button>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Sub Category Create Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="SubCategoryCreateModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <div class="form-group">
                            <label for="name">Parent Category Name</label>
                            <input type="text" class="form-control" id="parent_cat_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Sub Category Name</label>
                            <input type="text" class="form-control" id="sub_cat_name">
                        </div>
                        <input type="hidden" id="sub_cat_token" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                        <input type="hidden" id="parent_cat_id" name="id">
                        <div class="row justify-content-end no-gutters mt-3">
                            <button class="btn btn-primary btn-sm" onclick="createSubCategory(event)">Create</button>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Category Create Modal End -->

@endsection

@section('script')
        <script>
            function fun(name,id)
            {
                $("#edit_name") . val (name);
                $("#edit_id") . val (id);
                $("#CatUpdateModel") . modal ("show");
            }

            function startEdit(e)
            {
                e.preventDefault();
                name = $("#edit_name") . val ();
                id = $("#edit_id") . val ();
                token = $("#edit_token") . val ();
                $("#CatUpdateModel") . modal ("hide");
                $.ajax({
                    type:'POST',
                    url: '/admin/category/' + id + '/update',
                    data: {
                        name: name,
                        token: token,
                        id: id
                    },
                    success: function (result){
                        window.location.href = "/admin/category/create";
                    },
                    error: function (respone){
                        str = "";
                        resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }

            function showSubCatModel(name,id)
            {
                $("#parent_cat_name") . val (name);
                $("#parent_cat_id") . val (id); 
                $("#SubCategoryCreateModel") . modal ("show");
            }

            function createSubCategory(e)
            {
                e.preventDefault();
                name = $("#sub_cat_name") . val ();
                token = $("#sub_cat_token") . val ();
                parent_cat_id = $("#parent_cat_id") . val ();
                $("#SubCategoryCreateModel") . modal ("hide");
                $.ajax({
                    type:'POST',
                    url: '/admin/subcategory/create',
                    data: {
                        name: name,
                        token: token,
                        parent_cat_id: parent_cat_id
                    },
                    success: function (result){
                        console.log(result);
                        // window.location.href = "/admin/category/create";
                    },
                    error: function (respone){
                        // str = "";
                        // resp = (JSON.parse(respone.responseText));
                        // alert(resp.name);
                        alert(respone);
                    }
                });
            }
        </script>
@endsection



