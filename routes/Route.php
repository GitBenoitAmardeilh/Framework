<?php

/**
 * Ok
 */

class Route{

    /**
     * @var string
     * Contient l'URL saisie
     */
    private static $url;


    /** 
     * @var array 
     */
    private static $getList = [];


    /**
     * @var string
     * the name of called controller
     */
    public static $controller;


    /**
     * @var string
     * the name of called action
     * 
     */
    public static $action;


    /**
     * Calls the controller
     * 
     * @return void
     */
    public static function launch(){

        $controller = self::$controller;
        $actions = self::$action;

        $controller::$actions();

    }


    /**
     * Check that the URL exists in the table self::$getList
     * 
     * @return void
     */
    public static function agent($app){

        // Save URL in $getList array()
        self::setUrl();

        $exist = false;
        
        try {

            foreach(self::$getList as $key => $value){
                
                if( self::$url == str_replace("/","",$key)){

                    self::$controller = $value[0];
                    self::$action = $value[1];
                    $exist = true;
                    break;
    
                }

                //echo " existe pas --[ ".self::$url." ".str_replace("/","",$key)." ]-- </br>";
            }

             //Si la Route n'existe pas, on retourne une exception
            if($exist == false)
                throw new Exception("ROUTE [404] - Unknown URL");

        } catch (Exception $e) {

            $app["Errors"]->setDataErrorMessage($e);

        }

    }


    /**
     * Add all routes (Check Web.php) in the array self::$getList
     * 
     * @param string $routeName
     * @param array $data
     * @return void
     */
    public static function get($routeName , $data){

        self::$getList[$routeName] = $data;

    }

    /**
     * Return all routes
     * 
     * @return array
     */
    public static function getListRoutes(){
        
        return self::$ListRoutes;


    }
    
    public static function getUrl(){

        return self::$url;

    }

    public static function setUrl(){

        self::$url = $_GET['p'];

    }

}