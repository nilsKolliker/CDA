<?php

class Plan_Centres 
{

	/*****************Attributs***************** */

	private $_idCentre;
	private $_libelle;
	private static $_attributes=["idCentre","libelle"];
	/***************** Accesseurs ***************** */


	public function getIdCentre()
	{
		return $this->_idCentre;
	}

	public function setIdCentre(?int $idCentre)
	{
		$this->_idCentre=$idCentre;
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
		return "IdCentre : ".$this->getIdCentre()."Libelle : ".$this->getLibelle()."\n";
	}
}