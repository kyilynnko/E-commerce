<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        view("admin/category/create");
    }

    public function store()
    {
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            echo "Authenticated Token";
        }else{
            echo "CSRF Attack Occur!";
        }
    }
}
?>