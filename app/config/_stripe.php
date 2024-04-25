<?php

use App\Classes\Session;
use Stripe\Stripe;

$stripe = [
    "secret_key" => $_ENV["STRIPE_SECRET_KEY"],
    "publishable_key" => $_ENV["STRIPE_PUBLISHABLE_KEY"]
];
Session::replace("publishable_key", $stripe["publishable_key"]);
Stripe::setApiKey($stripe["secret_key"]);

?>
