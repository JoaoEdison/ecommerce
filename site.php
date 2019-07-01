<?php

use \Hcode\page;
use \Hcode\Model\Product;

$app->get('/', function() {
    
    $products = Product::listAll();
    
    $page = new page();
    
    $page->setTpl("index", [
        "products"=>Product::checkList($products)
    ]);
    
});