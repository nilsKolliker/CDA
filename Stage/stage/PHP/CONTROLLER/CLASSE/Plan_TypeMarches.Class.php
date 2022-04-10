<?php

class Plan_TypeMarches 
{

	/*****************Attributs***************** */

	private $_idTypeMarche;
	private $_libelle;
	private static $_attributes=["idTypeMarche","libelle"];
	/***************** Accesseurs ***************** */


	public function getIdTypeMarche()
	{
		return $this->_idTypeMarche;
	}

	public function setIdTypeMarche(?int $idTypeMarche)
	{
		$this->_idTypeMarche=$idTypeMarche;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle(string $libelle)
	{
		$this->_libelle=$libelle;
	}

	public static function getAttributes()
	{
		return self::$_attributes;
	}

	/*****************Constructeur***************** */

	public function __construct(array $options = [])
	{
 		if (!empty($options)) // empty : renvoi vrai si le tableau est vide
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
 		foreach ($data as $key => $value)
		{
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
			if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
			{
				$this->$methode($value===""?null:$value);
			}
		}
	}

	/*****************Autres Méthodes***************** */

	/**
	* Transforme l'objet en chaine de caractères
	*
	* @return String
	*/
	public function toString()
	{
		return "idTypeMarche : ".$this->getIdTypeMarche()."Libelle : ".$this->getLibelle()."\n";
	}
}