<?php
$router = new AltoRouter();
// $router->setBasePath("/E-commerce/public"); when go with localhost////

$router->map("GET","/","App\Controllers\BaseController@index","Home Route");
new App\Routing\RouteDispatcher($router);

?>