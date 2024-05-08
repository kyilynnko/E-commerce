@extends("layout.master")
@section("Title","Payment success")

@section("content")
<div class="contaionr my-5">
    <h1 class="text-success english">Payment Success</h1>
    <a href="/">Go back Home</a>
</div>
@endsection

@section('script')
<script>
    localStorage.removeItem('products');
    localStorage.removeItem('items')
</script>
@endsection