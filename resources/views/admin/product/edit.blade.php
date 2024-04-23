@extends("layout.master")
@section("Title","Product Edit Page")
@section("content")
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">

            @include("layout.report_message")

            <!-- Form start -->
            <form class="table-bordered pb-5 px-5 english" action="/admin/product/{{$product->id}}/edit" method="post" enctype="multipart/form-data">

                <h2 class="text-center my-5 text-info">Product Edit Page</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" value="{{$product->price}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select class="form-control" id="cat_id" name="cat_id">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}"  <?php echo $cat->id === $product->cat_id ? 'selected' : '' ?> >{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_cat_id">Sub Category</label>
                            <select class="form-control" id="sub_cat_id" name="sub_cat_id">
                                @foreach($sub_cats as $cat)
                                    <option value="{{$cat->id}}" <?php echo $cat->id === $product->sub_cat_id ? 'selected' : '' ?> >{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" class="form-control-file bg-dark text-white english" id="file" name="file">
                </div>

                <input type="hidden" name="old_image" value="{{$product->image}}">

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">
                        {{$product->description}}
                    </textarea>
                </div>

                <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">

                <div class="row justify-content-end no-gutters">
                    <button type="reset" class="btn btn-outline-secondary btn-sm">Cancle</button>
                    <button type="submit" class="btn btn-primary btn-sm ml-3">Update</button>
                </div>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
@endsection