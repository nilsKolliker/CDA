<?php

class Plan_Rattachements 
{

	/*****************Attributs***************** */

	private $_idRattachement;
	private $_idUtilisateur;
	private $_idCentre;
	private static $_attributes=["idRattachement","idUtilisateur","idCentre"];
	/***************** Accesseurs ***************** */


	public function getIdRattachement()
	{
		return $this->_idRattachement;
	}

	public function setIdRattachement(?int $idRattachement)
	{
		$this->_idRattachement=$idRattachement;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(?int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	public function getIdCentre()
	{
		return $this->_idCentre;
	}

	public function setIdCentre(?int $idCentre)
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
		return "IdRattachement : ".$this->getIdRattachement()."IdUtilisateur : ".$this->getIdUtilisateur()."IdCentre : ".$this->getIdCentre()."\n";
	}
}