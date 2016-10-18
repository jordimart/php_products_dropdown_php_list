<?php
class productDAO {

    static $_instance;

//constructor vacio
    private function __construct() {

    }
//funcion para instanciar clases
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_DAO($db, $arrArgument) {

        $serial_number = $arrArgument['serial_number'];
        $category = $arrArgument['category'];
        $trademark = $arrArgument['trademark'];
        $model = $arrArgument['model'];
        $date_entry = $arrArgument['date_entry'];
        $date_exit = $arrArgument['date_exit'];
        $purchase_price = $arrArgument['purchase_price'];
        $sale_price = $arrArgument['sale_price'];
        $provider = $arrArgument['provider'];
        $weight = $arrArgument['weight'];
        $height = $arrArgument['height'];
        $width = $arrArgument['width'];
        $description = $arrArgument['description'];
        $status = $arrArgument['status'];
        $warranty = $arrArgument['warranty'];
        $avatar = $arrArgument['avatar'];

        $Any = 0;
        $six_months = 0;
        $one_year = 0;
        $five_years = 0;
        $eight_years = 0;

        foreach ($warranty as $indice) {
            if ($indice === 'Any')
                $Any = 1;
            if ($indice === '6 months')
                $six_months = 1;
            if ($indice === '1 year')
                $one_year = 1;
            if ($indice === '5 years')
                $five_years = 1;
            if ($indice === '8 years')
                $eight_years = 1;
        }


        $sql = "INSERT INTO products(serial_number, category, trademark, model,"
                  . " date_entry, date_exit,purchase_price,sale_price,provider,weight,height,"
                  . " width,description,status,Any,6_months,1_year,5_years,8_years,avatar)"
                  . " VALUES ('$serial_number','$category','$trademark','$model','$date_entry','$date_exit','$purchase_price','$sale_price',"
                  . " '$provider','$weight','$height','$width','$description','$status','$Any','$six_months','$one_year','$five_years','$eight_years','$avatar')";

        return $db->ejecutar($sql);
        //return ("Estoy dentro del Dao");
    }

}
