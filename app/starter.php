<?php

define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

require('config/Env.php');
require('app/services/AppServices.php');

//echo "** INITIALISATION ** </br></br>";
$serv = new AppServices();

if($serv->getIsInit() == 1){

    $app = $serv->getObjArray();

    Route::agent($app);


    $co = $app["DatabaseServices"]->connexion($app);

    if(sizeOf($app["Errors"]->getErrosList()) > 0){

        $app["Errors"]->show();


    } else {

        Route::launch();

    }



}

