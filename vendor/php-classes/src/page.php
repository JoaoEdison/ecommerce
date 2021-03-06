<?php
namespace Hcode;
use Rain\Tpl;

class page {
    
    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[],
        "header"=>true,
        "footer"=>true
    ];
    
public function __construct($opts = array(), $tpl_dir = "/views/"){
        
        $this->options = array_merge($this->defaults, $opts);
        
        $config = array(
            "tpl_dir"=>$_SERVER["DOCUMENT_ROOT"].$tpl_dir,
            "cache_dir"=>$_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"=>false
	);

    Tpl::configure( $config );
    
    $this->tpl = new Tpl;
    
    $this->setData($this->options["data"]);
    
    if ($this->options["header"]){
        
        $this->tpl->draw("header");
            
    }        
        
}
    
private function setData($data = array())
{		
    foreach ($data as $key => $value) {
    
       $this->tpl->assign($key, $value);
     
    }
     
}
    
public function setTpl($nametpl, $data = [], $returnHTML = false)
{
        
    $this->setData($data);

    return $this->tpl->draw($nametpl, $returnHTML);    
        
}
    
public function __destruct()
{
    if ($this->options["footer"]){    
        
        $this->tpl->draw("footer");
        
    }
}
    
}

?>