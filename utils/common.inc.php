<?php
    function loadModel($model_path, $model_name, $function, $arrArgument = '') {
        $model = $model_path . $model_name . '.class.singleton.php';

        if (file_exists($model)) {
            include_once($model);

            $modelClass = $model_name;

            if (!method_exists($modelClass, $function)){
                //die($function . ' function not found in Model ' . $model_name);
                $message = ($function . ' function not found in Model ' . $model_name);
                $arrData = $message;
                require_once 'view/inc/404.php';
                exit();

            }

            $obj = $modelClass::getInstance();

            if (isset($arrArgument)) {
                return $obj->$function($arrArgument);
            }
        } else {
            //die($model_name . ' Model Not Found under Model Folder');
            $message = "Model Not Found under Model Folder";
            $arrData = $message;
            require_once 'view/inc/404.php';
            exit();
        }
    }

    function loadView($rutaVista, $templateName, $arrPassValue = '') {
    		$view_path = $rutaVista . $templateName;
    		$arrData = '';

    		if (file_exists($view_path)) {
    			if (isset($arrPassValue))
    				$arrData = $arrPassValue;
    			include_once($view_path);
    		} else {
    			//die($templateName . ' Template Not Found under View Folder');

    			$message = "NO TEMPLATE FOUND";
    			$arrData = $message;
    			require_once 'view/inc/404.php';
    			exit();
    		}
    	}
