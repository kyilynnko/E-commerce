<?php

use App\Classes\Mail;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use Illuminate\Database\Capsule\Manager as Capsule;


require_once "../bootstrap/init.php";

// paginate(5,10,"categories",new \App\Controllers\CategoryController());




// $validator = new ValidateRequest();
// $con = $validator->number("email","12.12","5");
// var_dump($con);


// $post = [
//     "name" => "Mg Mg#",
//     "age" => 21,
//     "email" => "kyilynnko@gmail.com"
// ];
// $policy = [
//     "name" => ["string" => true, "minLength" => "5"],
//     "age" => ["number" => true, "minLength" => "2"],
//     "email" => ["email" => true, "maxLength" => "25"]
// ];
// $validator = new ValidateRequest();
// $validator->checkValidate($post,$policy);
// if($validator->hasError()){
//     beautify($validator->getError());
// }else{
//     echo "Good to go!";
// }



// Session::replace("name","tester1");
// echo Session::get("name");
// echo $_SESSION["name"];
// Session::flash("create_success","Category Create Successfully");
// Session::flash("create_success");
// echo Session["create_success"];





// $user = Capsule::table("users")->where("id",1)->get();
// echo "<pre>". print_r($user,true) ."</pre>";




// $mailer = new Mail();
// $content = "The maintainers of PHPMailer and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open-source packages you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact packages you use";
// $data = [
//     "to" => "hw329446@gmail.com",
//     "to_name" => "Danny",
//     "content" => $content,
//     "subject" => "New mail testing for e-commerce project",
//     "filename" => "welcome",
//     "img_link" => "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png"
// ];
// if ($mailer->send($data)){
//     echo "Mail send success";
// }else{
//     echo "Mail send fail";
// }


?>