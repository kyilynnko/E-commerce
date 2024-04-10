<?php
namespace App\Controllers;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\SubCategory;

class SubCategoryController extends BaseController
{
    public function store()
    {
        $post = Request::get('post');
        
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["minLength" => "5", "unique" => "sub_categories"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->getError()){
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getError();
                echo json_encode($errors);
                exit;
            } else{
                $subcat = new SubCategory();
                $subcat->name = $post->name;
                $subcat->cat_id = $post->parent_cat_id;
                echo $subcat->name;
                if($subcat->save()){
                    echo "Sub Category create Successfully!";
                    exit;
                }else{
                    header('HTTP/1.1 422  Sub Category Create Fail!', true, 422);
                    echo "Sub Category Create Fail!";
                    exit;
                }
            }
        }else{
                header('HTTP/1.1 422 Token Mis-Match Error!', true, 422);
                echo "Token Mis-Match Error!";
                exit;
        }
    }

    public function update()
    {
        $post = Request::get('post');
        
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["minLength" => "5", "unique" => "sub_categories"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->getError()){
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getError();
                echo json_encode($errors);
                exit;
            } else{
                SubCategory::where("id", $post->id)->update(["name"=> $post->name]);
                echo "Sub Category Update Successfully!";
                exit;
            }
        }else{
                header('HTTP/1.1 422 Token Mis-Match Error!', true, 422);
                echo "Token Mis-Match Error!";
                exit;
        }
    }

    public function  delete($id) 
    {
        $con = SubCategory::destroy($id);
        if($con){
            Session::flash("delete_success","Sub Category Delete Successfully!");
            Redirect::to("/admin/category/create");
        }else{
            Session::flash("delete_fail","Sub Category Delete fail!");
            Redirect::to("/admin/category/create");            
        }
    }
}

?>




          
            
        



