<?php

class Home extends Controller{
    
    public static function index(){
        
        self::render('home');
        
    }

    public static function accueil(){
        self::render('accueil');
    }
    
}