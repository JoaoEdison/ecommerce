<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use Hcode\page;
use Hcode\pageadmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
    $page = new page();
    
    $page->setTpl("index");
    
});

$app->get('/admin', function() {
    
    $page = new pageadmin();
    
    $page->setTpl("index");
    
});

$app->run();

 ?>