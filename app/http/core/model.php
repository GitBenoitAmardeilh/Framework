<?php

class Model{

	protected $bdd;
	
	private $host;
	private $database;
	private $pseudo;
	private $password;

	public $table;
	public $id;

	public function __CONSTRUCT(){

		$this->host = HOST;
		$this->database = DATABASE;
		$this->pseudo = PSEUDO;
		$this->password = PASSWORD;

		$this->connexion();
	}

	public function getBDD(){
		return $this->bdd;
	}

	public function connexion(){
		$this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->pseudo,$this->password);
	}

	public function read($field = "*"){

		if($field == NULL){ $field = "*"; }

		$sql = 'SELECT '.$field.' FROM '.$this->table.' ';
		$req = $this->bdd->query($sql);
		$data = $req->fetch();
		return $data;
	}

}