<?php
namespace App\Controllers;

use App\Classes\Request;
use Stripe\Charge;
use Stripe\Customer;

class PaymentController
{
    public function stripePayment()
    {
        $post = Request::get("post");
        $token = $post->stripeToken;
        $email = $post->stripeEmail;

        $customer = Customer::create([
            "email" => $email,
            "source" => $token
        ]);

        $charge = Charge::create([
            "customer" => $customer->id,
            "amount" =>5000,
            "currency" => 'usd'
        ]);

        $status = $charge->status;
        $index = new IndexController();
        $con = $index->saveItemsToDatabase($status,json_encode($charge));
        if ($con){
            view("payment_success");
        }else{
            view("cart");
        }
    }

    // public function paypalSuccess($paymentID,$payerID,$paymentToken)
    // {
    //     echo "Payment Id is " . $paymentID . "<br>";
    //     echo "Payer Id is " . $payerID . "<br>";
    //     echo "Payment Token is " . $paymentToken . "<br>";
    // }

    public function paypalSuccess()
    {
        view("payment_success");
    }
}
?>