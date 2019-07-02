<?php

use \Hcode\page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;

$app->get('/', function() {
    
    $products = Product::listAll();
    
    $page = new page();
    
    $page->setTpl("index", [
        "products"=>Product::checkList($products)
    ]);
    
});

$app->get('/categories/:idcategory', function($idcategory){
    
    $category = new Category();
    
    $category->get((int)$idcategory);
    
    $page = new page();
    
    $page->setTpl("category", [
        "category"=>$category->getValues(),
        "products"=>Product::checkList($category->getProducts())    
    ]);
    
});