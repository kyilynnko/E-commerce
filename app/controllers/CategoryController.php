<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UpdateFile;
use App\Classes\ValidateRequest;
use App\Models\SubCategory;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all()->count();
        list($cats, $pages) = paginate(3, $categories, true, false, false);
        $cats = json_decode(json_encode($cats));  // Convert $cats array to object

        $subcategories = SubCategory::all()->count();
        list($sub_cats, $sub_pages) = paginate(3, $subcategories, false, true, false);
        $sub_cats = json_decode(json_encode($sub_cats));  // Convert $sub_cats array to object

        return view("admin/category/create", compact('cats', 'pages', 'sub_cats', 'sub_pages'));
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
                $errors = $validator->getError();
                $categories = Category::all()->count();
                list($cats,$pages) = paginate(3,$categories,new Category());
                $cats = json_decode(json_encode($cats));  // --> array $cat['name'] in create.blade.php change to object $cat->name
                view("admin/category/create",compact('cats','errors','pages'));

            }else{
                $slug = slug($post->name);
                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);
                if($con){
                    $success = "Category Create Successfully!";
                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories,new Category());
                    $cats = json_decode(json_encode($cats));  // --> array $cat['name'] in create.blade.php change to object $cat->name
                    view("admin/category/create",compact('cats','success','pages'));
                }else{
                    $errors = $validator->getError();
                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories,new Category());
                    $cats = json_decode(json_encode($cats));  // --> array $cat['name'] in create.blade.php change to object $cat->name
                    view("admin/category/create",compact('cats','errors','pages'));
                }
            }
        }else{
            Session::flash("error","CSRF field Error!");
            Redirect::back();
        }
    }

    public function  delete($id) 
    {
        $con = Category::destroy($id);
        if($con){
            Session::flash("delete_success","Category Delete Successfully!");
            Redirect::to("/admin/category/create");
        }else{
            Session::flash("delete_fail","Category Delete fail!");
            Redirect::to("/admin/category/create");            
        }
    }

    public function update()
    {
        $post = Request::get('post');

        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "categories"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);

            if($validator->hasError()){
                header('HTTP/1.1 422 Validation Error!', true, 422);
                echo json_encode($validator->getError());
                exit;
            }else{
                Category::where("id", $post->id)->update(["name" => $post->name]);
                echo json_encode("Category Updated Successfully!");
                exit;
            }
        }else{
            header('HTTP/1.1 422 Token Mis-Match Error!', true, 422);
            echo json_encode(["error" => "Token Mis->Match Error!"]);
            exit;
        }
    }
}
?>