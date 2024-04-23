@extends("layout.master")

@section("Title","Danny")

@section("content")

<style>
    .pagination > li{
        padding: 5px 15px;
        background: #ddd;
        margin-right: 1px;
    }
</style>

<div class="container my-5 english">

    <h1 class="text-info english">Featured</h1>
    <div class="row">
        @foreach($featured as $product)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">{{$product->name}}</div>
                    <div class="card-block text-center">
                        <img src="{{$product->image}}" alt="" width="200" height="250">    
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>${{$product->price}}</span>
                            <button class="btn btn-info btn-sm" onclick="addToCart('{{$product->id}}')">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h1 class="text-info english">Most Popular</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">{{$product->name}}</div>
                    <div class="card-block text-center">
                        <img src="{{$product->image}}" alt="" width="200" height="250">    
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>${{$product->price}}</span>
                            <button class="btn btn-info btn-sm" onclick="addToCart('{{$product->id}}')">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-2 offset-md-4">
        {!!$pages!!}
    </div>
</div>

@endsection

