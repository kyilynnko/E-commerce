<?php
// Admin home
$router->map("GET","/admin","App\Controllers\AdminController@index","Admin Home");
$router->map("GET","/admin/category/create","App\Controllers\CategoryController@index","Category Create");
$router->map("POST","/admin/category/create","App\Controllers\CategoryController@store","Category Store");
$router->map("GET","/admin/category/[i:id]/delete","App\Controllers\CategoryController@delete","Category Delete");
$router->map("POST","/admin/category/[i:id]/update","App\Controllers\CategoryController@update","Category Update");
$router->map("POST","/admin/subcategory/create","App\Controllers\SubCategoryController@store","Sub Category Create");
$router->map("POST","/admin/subcategory/update","App\Controllers\SubCategoryController@update","Sub Category Update");
$router->map("GET","/admin/subcategory/[i:id]/delete","App\Controllers\SubCategoryController@delete","Sub Category Delete");
$router->map("GET","/admin/product/home","App\Controllers\ProductController@home","Product Home");
$router->map("GET","/admin/product/create","App\Controllers\ProductController@create","Product Create");
$router->map("POST","/admin/product/create","App\Controllers\ProductController@store","Product Store");
$router->map("GET","/admin/product/[i:id]/edit","App\Controllers\ProductController@edit","Product Edit");
$router->map("POST","/admin/product/[i:id]/edit","App\Controllers\ProductController@update","Product Update");
$router->map("GET","/admin/product/[i:id]/delete","App\Controllers\ProductController@delete","Product Delete");

?>