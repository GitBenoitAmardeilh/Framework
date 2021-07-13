<?php

class AppExceptionsEngine{

    private static $dataErrorMessage = [

        'message'       => '',
        'code'          => '',
        'file'          => '',
        'line'          => '',
        'lineNumber'    => '',
        'class'         => '',
        'url'           => '',
        'urlList'       => [],
        'controller'    => [],
        'action'        => [],

    ];

    // Save all Errors
    private static $errorsList = array();

    public function save( $exception ){
        
        self::setDataErrorMessage($exception);

    }

    public function getErrosList(){

        return self::$errorsList;

    }

    public function getDataErrorMessage(){

        return self::$dataErrorMessage;

    }


    public function setDataErrorMessage($exception){
        

        self::$dataErrorMessage['message'] = $exception->getMessage();
        self::$dataErrorMessage['code'] = $exception->getCode();
        self::$dataErrorMessage['file'] = $exception->getFile();
        self::$dataErrorMessage['lineNumber'] = $exception->getLine();
        self::$dataErrorMessage['class'] = $exception->getTrace()[0]["class"];
        // !!!! Si erreur avec BDD, le classe Route n'est plus accéssible !!!!!
        //self::$dataErrorMessage['url'] = Route::getUrl();

        array_push(self::$errorsList,self::$dataErrorMessage);


        //self::$dataErrorMessage['urlList'][$i] = $key;
        //self::$dataErrorMessage['controller'][$i] = $value[0];
        //self::$dataErrorMessage['action'][$i] = $value[1];


    }

    public function show(){

        Controller::setData( self::$errorsList );
        Controller::renderError('error');

    }

}