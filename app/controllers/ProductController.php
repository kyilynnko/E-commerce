<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController
{
    public function home()
    {
        $pds = Product::all()->count();
        list($products, $pages) = paginate(4,$pds, false, false, true);
        $products = json_decode(json_encode($products));
        return view("admin/product/home",compact("products","pages"));
    }

    public function create()
    {
        $cats = Category::all();
        $sub_cats = SubCategory::all();
        view("admin/product/create",compact('cats','sub_cats'));
    }

    public function store()
    {
        $post = Request::get('post');
        $file = Request::get('file');
        
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "unique" => "products", "minLength" => "5"],
                "description" => ["required" => true, "minLength" => "20"],
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                $errors = $validator->getError();
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view("admin/product/create",compact('cats','sub_cats','errors'));
            }else{
                if(!empty($file->file->name)){
                    $uploadFile = new UploadFile();
                    if($uploadFile->move($file)){
                        $path = $uploadFile->getPath();
                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $path;

                        if($product->save()){
                            $products = Product::all();
                            Session::flash("Product_insert_success","Product successfully Created!");
                            Redirect::to("/admin/product/home",compact("products"));
                        }else{
                            $errors = ["Please check Picture size and type!"];
                            $cats = Category::all();
                            $sub_cats = SubCategory::all();
                            view("admin/product/create",compact('cats','sub_cats','errors'));
                        }
                    }else{
                        $errors = ["Problem insert product to database!"];
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        view("admin/product/create",compact('cats','sub_cats','errors'));
                    }
                }else{
                    $errors = ["Please support image file!"];
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    view("admin/product/create",compact('cats','sub_cats','errors'));
                }
            }
        }else{
                $errors = ["Token Mis-Match error!"];
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view("admin/product/create",compact('cats','sub_cats','errors'));
        }
    }

    public function edit($id)
    {
        $cats = Category::all();
        $sub_cats = SubCategory::all();
        $product = Product::where("id", $id)->first();
        view("/admin/product/edit",compact('cats','sub_cats','product'));
    }

    public function update($id)
    {
        $post = Request::get('post');
        $file = Request::get('file');
        $f_path = "";
        
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "unique" => "products", "minLength" => "5"],
                "description" => ["required" => true, "minLength" => "20"],
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                $errors = $validator->getError();
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                $product = Product::where("id", $id)->first();
                return view("admin/product/edit", compact('cats', 'sub_cats', 'errors', 'product'));
            }else{
                if(empty($file->file->name)){
                    $f_path = $post->old_image;
                }else{
                    $uploadFile = new UploadFile();
                    if($uploadFile->move($file)){
                        $f_path = $uploadFile->getPath();
                    }else{
                        $errors = ["File_move_error" => "Can't move upload file!"];
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        $product = Product::where("id", $id)->first();
                        return view("admin/product/edit", compact('cats', 'sub_cats', 'errors', 'product'));
                    }
                }
                
                $product = Product::where('id', $id)->first();
                $product->name = $post->name;
                $product->price = $post->price;
                $product->cat_id = $post->cat_id;
                $product->sub_cat_id = $post->sub_cat_id;
                $product->description = $post->description;
                $product->image = $f_path;

                if($product->update()){
                    Session::flash("Product_insert_success","Product successfully Updated!");
                    return Redirect::to("/admin/product/home");
                }else{
                    $errors = ["file_move_error" => "Product Update Error"];
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    $product = Product::where("id", $id)->first();
                    return view("admin/product/edit", compact('cats', 'sub_cats', 'errors', 'product'));
                }
            }
        }else{
            Session::flash("Product_update_fail","Product Update Fail!");
            return Redirect::to("/admin/product/".$id."/edit");
        }
    }

}

?>