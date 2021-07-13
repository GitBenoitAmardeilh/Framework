<?php

class DatabaseServices{

	protected $bdd;
	private $host;
	private $database;
	private $pseudo;
	private $password;


	public static $isConnect = false;

	public function __CONSTRUCT(){

		//$this->host 	= BDDInfo::getInfos()["HOST"];
		//$this->database = BDDInfo::getInfos()["DATABASE"];
		//$this->pseudo 	= BDDInfo::getInfos()["USER_NAME"];
		//$this->password = BDDInfo::getInfos()["PASSWORD"];

		$this->host 	= HOST;
		$this->database = DATABASE;
		$this->pseudo 	= USER_NAME;
		$this->password = PASSWORD;

	}

	public function getBDD(){

		return $this->bdd;
		
	}

	public function connexion($app){

		try {

			$this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->pseudo,$this->password);
			//$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			//echo "BDD Error </br>";
			//$app["Errors"]->save($e);

			$app["Errors"]->setDataErrorMessage($e);

		}

		return $this->bdd;

	}

}