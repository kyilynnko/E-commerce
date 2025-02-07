<?php
namespace App\Routing;
use AltoRouter;
class RouteDispatcher
{
    private $match;
    private $controller;
    private $method;

    public function __construct(AltoRouter $router)
    {
        $this->match = $router->match();

        if($this->match){
            list($controller,$method) = explode("@", $this->match["target"]);

            $this->controller = $controller;
            $this->method = $method;
            var_dump(is_callable([new $this->controller,$this->method]));
            if(!is_callable([new $this->controller,$this->method])){
                echo "It is callable";
                call_user_func_array([new $this->controller,$this->method], $this->match["params"]);
            }else{
                echo "It is not callabe";
            }
        }else{
            header($_SERVER["SERVER_PROTOCOL"] . "404 not found");
            echo "Not match route";
        }
    }
}








?>