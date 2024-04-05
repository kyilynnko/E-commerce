<?php

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;

class Subcategorycontroller extends BaseController
{
    public function store()
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "sub-categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);

            if($validator->getError()){
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getError();
                echo json_encode($errors);
                exit;
            }else{
                echo json_encode($post);
                exit;
            }
        }else{
                header('HTTP/1.1 422 Validation Error!', true, 422);
                echo "Token Mis-Match Error!";
                exit;
        }
    }
}
?>