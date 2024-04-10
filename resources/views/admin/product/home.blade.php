@extends("layout.master")
@section("title","Product Home Page")
@section("content")
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
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">
            @if(\App\Classes\Session::has("Product_insert_success"))
                {{\App\Classes\Session::flash("Product_insert_success")}}
            @endif

            <!-- Table Start -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="text-muted">
                            <td>{{$product->id}}</td>
                            <td><img src="{{$product->image}}" alt="" style="max-width:100px;max-height:150px"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="/admin/product/{{$product->id}}/edit" class="text-warning"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <!-- Table End -->
            <div class="mt-2 offset-md-4">
                {!!$pages!!}
            </div>
        </div>
    </div>
</div>
@endsection