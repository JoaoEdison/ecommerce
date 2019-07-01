<?php

use \Hcode\page;

$app->get('/', function() {
    
    $page = new page();
    
    $page->setTpl("index");
    
});