<?php

class Session{

	public function __CONSTRUCT(){

		session_start();

	}

	public function setSession($value_session){

		$_SESSION['id'] = $value_session;

	}

	public static function getSession(){

		if(isset($_SESSION['id'])){ return $_SESSION['id']; }
	}

	public function sessionDestroy(){

		session_destroy();
		header('location:../accueil');
	}

}