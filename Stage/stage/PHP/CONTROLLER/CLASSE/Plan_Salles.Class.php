<?php

class Plan_Salles 
{

	/*****************Attributs***************** */

	private $_idSalle;
	private $_libelle;
	private $_nbrPlace;
	private $_idCentre;
	private static $_attributes=["idSalle","libelle","nbrPlace","idCentre"];
	/***************** Accesseurs ***************** */


	public function getIdSalle()
	{
		return $this->_idSalle;
	}

	public function setIdSalle(?int $idSalle)
	{
		$this->_idSalle=$idSalle;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle(string $libelle)
	{
		$this->_libelle=$libelle;
	}

	public function getNbrPlace()
	{
		return $this->_nbrPlace;
	}

	public function setNbrPlace(int $nbrPlace)
	{
		$this->_nbrPlace=$nbrPlace;
	}

	public function getIdCentre()
	{
		return $this->_idCentre;
	}

	public function setIdCentre(int $idCentre)
	{
		$this->_idCentre=$idCentre;
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
		return "IdSalle : ".$this->getIdSalle()."Libelle : ".$this->getLibelle()."NbrPlace : ".$this->getNbrPlace()."IdCentre : ".$this->getIdCentre()."\n";
	}
}