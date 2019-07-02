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
    
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    
    $category = new Category();
    
    $category->get((int)$idcategory);
    
    $pagination = $category->getProductsPage($page); 
    
    $pages = [];
    
    for ($i=1; $i <= $pagination['pages']; $i++){
        array_push($pages, [
            'link'=>'/categories/'.$category->getidcategory().'?page='.$i,
            'page'=>$i
        ]);
    }
    
    $page = new page();
    
    $page->setTpl("category", [
        "category"=>$category->getValues(),
        "products"=>$pagination["data"],
        "pages"=>$pages
    ]);
    
});