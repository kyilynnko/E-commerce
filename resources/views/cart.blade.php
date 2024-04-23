@extends("layout.master")

@section("Title","Danny")

@section("content")
<input type="hidden" name="" id="token" value="{{\App\Classes\CSRFToken::_token()}}">
<div class="container my-5">
    <!-- Table Start -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody id="tablebody">
              
            </tbody>
        </table>
    <!-- Table End -->
</div>
@endsection

@section('script')
<script>
    function loadProduct(){
        $.ajax({
            type: "POST",
            url: "/cart",
            data: {
                "cart": getCartItem(),
                "token": $("#token").val()
            },
            success: function (results) {
                saveProducts(results);
            },
            error: function (sespone) {
                console.log(sespone.responseText);
            }
        })
    }

    function saveProducts(res){
        localStorage.setItem("products",res);
        let results = JSON.parse(localStorage.getItem("products"));
        showProducts(results);
    }

    function addProductQty(id){
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) =>{
            if(result.id === id){
                result.qty = result.qty +1;
            }
         });
        saveProducts(JSON.stringify(results));
    }

    function deduceProductQty(id){
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) =>{
            if(result.id === id){
                if(result.qty > 1){
                    result.qty = result.qty -1;
                }
            }
        });
        saveProducts(JSON.stringify(results));
    }

    function deleteProduct(id){
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) =>{
            if(result.id === id){
                var ind =results.indexOf(result);
                results.splice(ind,1);
            }
        });
        deleteItem(id);
        saveProducts(JSON.stringify(results));
    }

    function showProducts(results){
        var str = '';
        var total = 0;
        results.forEach((result) =>{
            total += result.qty * result.price;
            str += "<tr>";
            str += `
                <td>${result.id}</td>
                <td><img src="${result.image}" alt="" width="150" height="200"></td>
                <td>${result.name}</td>
                <td>${result.price}</td>
                <td>${result.qty}</td>
                <td>
                    <i class="fa fa-plus" style="cursor:pointer" onclick="addProductQty(${result.id})"></i>
                    <i class="fa fa-minus" style="cursor:pointer" onclick= "deduceProductQty(${result.id})"></i>
                    <i class="fa fa-trash" style="cursor:pointer" onclick= "deleteProduct(${result.id})"></i>
                </td>
                <td>${(result.qty * result.price).toFixed(2)}</td>
            
            `;
            str += "</tr>";
        });
        str += `
            <tr>
                <td colspan='6' style='text-align:right'>Grand Total</td>
                <td>${total.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan='7' style='text-align:right'>
                    <a class = "btn btn-primary btn-sm" href="/user/login">Check Out</a>
                </td>
            </tr>
        `;
        $('#tablebody').html(str);

    }

    function payOut(){
        var results = JSON.parse(localStorage.getItem("products"));
        $.ajax({
            type: "POST",
            url: "/payout",
            data: {
                "items": results,
                "token": $("#token").val()
            },
            success: function (results) {
                clearCart();
                showCartItem();
                showProducts([]);
            },
            error: function (sespone) {
                console.log(sespone.responseText);
            }
        })
    }


    loadProduct();
</script>
@endsection