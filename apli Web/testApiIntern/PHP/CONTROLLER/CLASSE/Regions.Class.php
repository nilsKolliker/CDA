<?php

class Regions 
{

	/*****************Attributs***************** */

	private $_region_id;
	private $_region_nom;
	private static $_attributes=["region_id","region_nom"];
	/***************** Accesseurs ***************** */


	public function getRegion_id()
	{
		return $this->_region_id;
	}

	public function setRegion_id(int $region_id)
	{
		$this->_region_id=$region_id;
	}

	public function getRegion_nom()
	{
		return $this->_region_nom;
	}

	public function setRegion_nom(string $region_nom)
	{
		$this->_region_nom=$region_nom;
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
		return "Region_id : ".$this->getRegion_id()."Region_nom : ".$this->getRegion_nom()."\n";
	}
}