<?php

/**
 * charge all require(). Show "config/Env.php"
 */

class AppServices{

    private $isInit = false;

    private $objArray = [];

    public function __CONSTRUCT(){

        foreach(Env::$arrayEnv as $keyE => $value){

            $files = scandir($value);
            $i = 0;

            foreach($files as $keyF){
    
                if($keyF != "." && $keyF != ".." && $keyF != "AppServices.php" && $keyF != "Env.php" ){
                    
                    $keyF = substr($keyF,0, -4);
                    require($value . "/" . $keyF .".php");

                    if($keyF != "AppExceptionsEngine" || $keyF != "AppServices"){

                        switch($keyE){
                            case "EXPT_DIR":
                                //echo "Add Require [EXPT_DIR] - [ ".$keyF." ]</br>";
                                $this->setObjArray($keyF);
                                //$app[$keyF] = new $keyF($this);
                                //echo "- Classe ".$keyF."() Chargées </br></br>";
                                break;

                            case "CORE_DIR":
                                //echo "Add Require [CORE_DIR] - [ ".$keyF." ]</br>";
                                break;

                            case "CONFIG_DIR":
                                //echo "Add Require [CONFIG_DIR] - [ ".$keyF." ]</br>";
                                break;

                            case "SERVICES_DIR":
                                //echo "Add Require [SERVICES_DIR] - [ ".$keyF." ]</br>";
                                $this->setObjArray($keyF);
                                //$app[$keyF] = new $keyF($this);
                                //echo "- Classe ".$keyF."() Chargées </br></br>";
                                break;

                            case "CTRL_DIR":
                                //echo "Add Require [CTRL_DIR] - [ ".$keyF." ]</br>";
                                break;

                            case "ROUTES_DIR":
                                //echo "Add Require [ROUTES_DIR] - [ ".$keyF." ]</br>";
                                //$app[$keyF] = new $keyF($this);
                                //echo "- Classe ".$keyF."() Chargées </br></br>";
                                break;
                        }
                        
                    }

                }

                $i++;

            }

        }

        $this->isInit = true;

    }

    public function getIsInit(){

        return (bool) $this->isInit;

    }

    public function getObjArray(){

        return (array) $this->objArray;

    }

    public function setObjArray( $key ){

        $this->objArray[$key] = new $key();

    }

}