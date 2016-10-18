<?php

$path = $_SERVER['DOCUMENT_ROOT'] ;
define('SITE_ROOT', $path);
require(SITE_ROOT . "/modules/products/model/BLL/product_bll.class.singleton.php");

class product_model {

    private $bll;
    static $_instance;
//Instanciamos el bll para utilizarlo
    private function __construct() {
        $this->bll = product_bll::getInstance();
    }
//funcion para instanciar clases
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }
//esta función utiliza create_product del bll
    public function create_product($arrArgument) {
        return $this->bll->create_product_BLL($arrArgument);
        //return ("estoy en model");
    }

}
