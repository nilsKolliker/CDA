<?php

class Plan_Formations 
{

	/*****************Attributs***************** */

	private $_idFormation;
	private $_libelleCourt;
	private $_libelleLong;
	private $_GRN;
	private $_idUtilisateur;
	private static $_attributes=["idFormation","libelleCourt","libelleLong","GRN","idUtilisateur"];
	/***************** Accesseurs ***************** */


	public function getIdFormation()
	{
		return $this->_idFormation;
	}

	public function setIdFormation(?int $idFormation)
	{
		$this->_idFormation=$idFormation;
	}

	public function getLibelleCourt()
	{
		return $this->_libelleCourt;
	}

	public function setLibelleCourt(string $libelleCourt)
	{
		$this->_libelleCourt=$libelleCourt;
	}

	public function getLibelleLong()
	{
		return $this->_libelleLong;
	}

	public function setLibelleLong(string $libelleLong)
	{
		$this->_libelleLong=$libelleLong;
	}

	public function getGRN()
	{
		return $this->_GRN;
	}

	public function setGRN(int $GRN)
	{
		$this->_GRN=$GRN;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
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
		return "IdFormation : ".$this->getIdFormation()."LibelleCourt : ".$this->getLibelleCourt()."LibelleLong : ".$this->getLibelleLong()."GRN : ".$this->getGRN()."IdUtilisateur : ".$this->getIdUtilisateur()."\n";
	}
}