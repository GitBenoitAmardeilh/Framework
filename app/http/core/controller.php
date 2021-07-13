<?php 

class Controller{


	/**
	 * $vars
	 *
     * Cette variable (tableau) vas permettre de faire passer
     * d'une page à l'autre des variables.
     */

	private static $vars = array();
	private static $layout;


	/**
     * Cette fonction vas permettre d'extraire dans vars, les données 
     * qui ont étaient insérées dans $tab, et les retournées à la vue.
     */

	public static function setData($tab){

		/**
		* array_merge()
		*
		*
		* Fusionne plusieurs tableaux en un seul. Le résultat est un 
		* tableau.
		**/

		self::$vars = array_merge(self::$vars, $tab);

	}

	public function setLayout($lyt){

		$this->layout = $lyt;

	}

	/*inclu le fichier demandé*/
	public static function render($filename){

		/**
		 * extract($this->vars);
		 *
	     * Permet d'extraire toutes les données contenues dans vars
	     * Afin de les affichées dans la page demander.
	     */

		extract(self::$vars);

		/*Charge le contenu d'une page dans la varible $content_for_layout*/
		ob_start();
		require('ressources/views/'.strtolower($filename).'.php');
		$content_for_layout = ob_get_clean();

		/*Si le layout est vide, afficher la page demandée*/
		if(self::$layout == false){
			echo $content_for_layout;
		}
		else{
			require('views/layouts/'.self::$layout.'.php');
		}

	}

	public static function renderError($filename){

		/**
		 * extract($this->vars);
		 *
	     * Permet d'extraire toutes les données contenues dans vars
	     * Afin de les affichées dans la page demander.
	     */
		
		extract(self::$vars);

		/*Charge le contenu d'une page dans la varible $content_for_layout*/
		ob_start();

		require('ressources/views/errors/'.strtolower($filename).'.php');
		$content_for_layout = ob_get_clean();

		if(self::$layout == false){
			echo $content_for_layout;
		}
		else{
			require('views/layouts/'.self::$layout.'.php');
		}

	}

	/**
     * Cette fonction vas permettre de charger un modele dans le controlleur 
     * correspondant.
     */

	public function loadModel($nameModel){

		require_once('Models/'.lcfirst($nameModel).'.php');
		$this->$nameModel = new $nameModel();

	}
	
}

?>