<?php

$path = $_SERVER['DOCUMENT_ROOT'] ;
define('SITE_ROOT', $path);
define('MODEL_PATH', SITE_ROOT . '/model/');

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "/modules/products/model/DAO/product_dao.class.singleton.php");

class product_bll {

    private $dao;
    private $db;
    static $_instance;

//instanciamos el DAO Y la base de datos
    private function __construct() {
        $this->dao = productDAO::getInstance();
        $this->db = Db::getInstance();
    }
//función para instanciar clases
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

//esta funcion utiliza el create product del dao
    public function create_product_BLL($arrArgument) {
        return $this->dao->create_product_DAO($this->db, $arrArgument);
        //return ("estamos dentro del bll");
    }

}
