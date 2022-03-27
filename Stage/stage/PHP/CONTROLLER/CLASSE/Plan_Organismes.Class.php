<?php

class Plan_Organismes 
{

	/*****************Attributs***************** */

	private $_idOrganisme;
	private $_libelle;
	private static $_attributes=["idOrganisme","libelle"];
	/***************** Accesseurs ***************** */


	public function getIdOrganisme()
	{
		return $this->_idOrganisme;
	}

	public function setIdOrganisme(?int $idOrganisme)
	{
		$this->_idOrganisme=$idOrganisme;
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
		return "IdOrganisme : ".$this->getIdOrganisme()."Libelle : ".$this->getLibelle()."\n";
	}
}