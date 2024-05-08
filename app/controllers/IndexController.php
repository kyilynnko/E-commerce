<?php
namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;

class IndexController extends BaseController
{
    public function show()
    {
        $count = Product::all()->count();
        list($pros,$pages) = paginate(8,$count,false,false,true);
        $products = json_decode(json_encode(($pros)));

        $featured = Product::where('featured',2)->get();
        view("home",compact('products','pages','featured'));
    }

    public function cart()
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            $items = $post->cart;
            $carts = [];
            foreach($items as $item){
                $product = Product::where("id",$item)->first();
                $product->qty = 1;
                array_push($carts,$product);
            }
            echo json_encode($carts);
            exit;
        }else{
            echo "Token Mis Match Error!";
            exit;
        }
    }

    public function payout()
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
           Session::replace("cart-items",$post->items);
           echo "success";
           exit;
        }else{
            echo "Token Mis Match Error!";
            exit;
        }
    }

    public function saveItemsToDatabase($status="pending",  $extraData="")
    {
        $itemss = Session::get("cart-items");
        $itemss = [];
        $order_number = uniqid();
        $total = 0;
        foreach($itemss as $item){
            $total += $item->qty * $item->price;
            $od = new OrderDetail();
            $od->user_id = Auth::user()->id;
            $od->product_id = $item->id;
            $od->unit_price = $item->price;
            $od->status = $status;
            $od->quantity = $item->qty;
            $od->total = $item->qty * $item->price;
            $od->order_no = $order_number;

            $od->save();
        }
        //order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_no = $order_number;
        $order->order_extra = $extraData;

        $order->save();

        //payment
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->amount = $total;
        $payment->status = $status;
        $payment->order_no = $order_number;

        if($payment->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveOrder($orders)
    {
        $order = serialize($orders);
        return true;
    }

    public function showCart()
    {
        view('cart');        
    }

    public function productDetail($id)
    {
        $product = Product::Where("id",$id)->first();
        return view ('product', compact('product'));
    }
    
}
?>