<?php

namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\User;

class UserController
{
    public function showLoginForm()
    {
        if(Auth::check()){
            Redirect::to("/cart");
        }else{
            return view("user/login");
        }
    }

    public function login()
    {
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            $user = User::where("email",$post->email)->first();
            if($user){
                if(password_verify($post->password,$user->password)){
                    Session::add("user_id",$user->id);
                    Redirect::to("/cart");
                }else{
                    Session::flash("error_message","Password error!");
                    Redirect::to("/user/login");
                }
            }else{
                Session::flash("error_message","No user with that email!");
                Redirect::to("/user/login");
            }
        }else{
            Session::flash("error_message","Token Mis match error!");
            Redirect::to("/user/login");
        }
    }

    public function showRegisterForm()
    {
        return view("user/register");
    }

    public function register()
    {
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            if($post->password === $post->confirm_password){
                $rules = [
                    "name" => ["minLength" => "5"],
                    "email" => ["unique" => "users"],
                    "password" => ["minLength" => "5"],
                ];
                $validator = new ValidateRequest();
                $validator->checkValidate($post,$rules);
                if($validator->hasError()){
                    beautify($validator->getError());
                }else{
                    $user = new User();
                    $user->name = $post->name;
                    $user->email = $post->email;
                    $user->password = password_hash($post->password,PASSWORD_BCRYPT);

                    if($user->save()){
                        Session::flash("success_message","Register success. Please Login!");
                        Redirect::to("/user/login");
                    }else{
                        Session::flash("error_message","Database problem. Please contact Admin!");
                        Redirect::to("/user/register");
                    }
                }
            }else{
                Session::flash("error_message","Password do not match!");
                Redirect::to("/user/register");
            }
        }else{
                Session::flash("error_message","Token Mis match error!");
                Redirect::to("/user/register");
        }
    }

    public function logout()
    {
        Session::remove("user_id");
        Redirect::to("/");
    }
}
?>