<?php

class Departements 
{

	/*****************Attributs***************** */

	private $_departement_id;
	private $_departement_code;
	private $_departement_nom;
	private $_departement_nom_uppercase;
	private $_departement_slug;
	private $_departement_nom_soundex;
	private $_departement_regionId;
	private static $_attributes=["departement_id","departement_code","departement_nom","departement_nom_uppercase","departement_slug","departement_nom_soundex","departement_regionId"];
	/***************** Accesseurs ***************** */


	public function getDepartement_id()
	{
		return $this->_departement_id;
	}

	public function setDepartement_id(int $departement_id)
	{
		$this->_departement_id=$departement_id;
	}

	public function getDepartement_code()
	{
		return $this->_departement_code;
	}

	public function setDepartement_code(?string $departement_code)
	{
		$this->_departement_code=$departement_code;
	}

	public function getDepartement_nom()
	{
		return $this->_departement_nom;
	}

	public function setDepartement_nom(?string $departement_nom)
	{
		$this->_departement_nom=$departement_nom;
	}

	public function getDepartement_nom_uppercase()
	{
		return $this->_departement_nom_uppercase;
	}

	public function setDepartement_nom_uppercase(?string $departement_nom_uppercase)
	{
		$this->_departement_nom_uppercase=$departement_nom_uppercase;
	}

	public function getDepartement_slug()
	{
		return $this->_departement_slug;
	}

	public function setDepartement_slug(?string $departement_slug)
	{
		$this->_departement_slug=$departement_slug;
	}

	public function getDepartement_nom_soundex()
	{
		return $this->_departement_nom_soundex;
	}

	public function setDepartement_nom_soundex(?string $departement_nom_soundex)
	{
		$this->_departement_nom_soundex=$departement_nom_soundex;
	}

	public function getDepartement_regionId()
	{
		return $this->_departement_regionId;
	}

	public function setDepartement_regionId(?int $departement_regionId)
	{
		$this->_departement_regionId=$departement_regionId;
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
		return "Departement_id : ".$this->getDepartement_id()."Departement_code : ".$this->getDepartement_code()."Departement_nom : ".$this->getDepartement_nom()."Departement_nom_uppercase : ".$this->getDepartement_nom_uppercase()."Departement_slug : ".$this->getDepartement_slug()."Departement_nom_soundex : ".$this->getDepartement_nom_soundex()."Departement_regionId : ".$this->getDepartement_regionId()."\n";
	}
}