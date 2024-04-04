<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UpdateFile;
use App\Classes\ValidateRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $cats = Category::all();
        view("admin/category/create",compact('cats'));
    }

    public function store()
    {
        $post = Request::get("post");
        // Session::remove("token");   CSRF Attack Occur!
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if($validator->hasError()){
                $cats = Category::all();
                $errors = $validator->getError();
                // beautify($errors);
                view("admin/category/create",compact('cats'));
            }else{
                echo "Good to go";
            }
            // beautify(Request::get("post"));
            // echo "<hr>";
            // $uploadFile = new UpdateFile();
            // var_dump($uploadFile->move(Request::get("file")));
        }else{
            Session::flash("error","CSRF field Error!");
            Redirect::back();
        }
    }
}
?>