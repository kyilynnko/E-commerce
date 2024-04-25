<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Session;
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
            if (self::saveOrder($post->items)){
                echo "success";
                exit;
            }else{
                echo "Product save fail!";
                exit;
            }
        }else{
            echo "Token Mis Match Error!";
            exit;
        }
    }

    public function getItemsFromSession()
    {
        $items = Session::get("cart-items");
        beautify($items);   
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