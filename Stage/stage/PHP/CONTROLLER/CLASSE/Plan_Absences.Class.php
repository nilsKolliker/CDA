<?php

class Plan_Absences 
{

	/*****************Attributs***************** */

	private $_idAbsence;
	private $_typeDAbsence;
	private $_dateDebut;
	private $_dateFin;
	private $_idUtilisateur;
	private static $_attributes=["idAbsence","typeDAbsence","dateDebut","dateFin","idUtilisateur"];
	/***************** Accesseurs ***************** */


	public function getIdAbsence()
	{
		return $this->_idAbsence;
	}

	public function setIdAbsence(?int $idAbsence)
	{
		$this->_idAbsence=$idAbsence;
	}

	public function getTypeDAbsence()
	{
		return $this->_typeDAbsence;
	}

	public function setTypeDAbsence(string $typeDAbsence)
	{
		$this->_typeDAbsence=$typeDAbsence;
	}

	public function getDateDebut()
	{
		return is_null($this->_dateDebut)?null:$this->_dateDebut->format('Y-n-j');
	}

	public function setDateDebut(string $dateDebut)
	{
		$this->_dateDebut=DateTime::createFromFormat("Y-n-j",$dateDebut);
	}

	public function getDateFin()
	{
		return is_null($this->_dateFin)?null:$this->_dateFin->format('Y-n-j');
	}

	public function setDateFin(?string $dateFin)
	{
		$this->_dateFin=is_null($dateFin)?null:DateTime::createFromFormat("Y-n-j",$dateFin);
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(?int $idUtilisateur)
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
		return "IdAbsence : ".$this->getIdAbsence()."TypeDAbsence : ".$this->getTypeDAbsence()."DateDebut : ".$this->getDateDebut()."DateFin : ".$this->getDateFin()."IdUtilisateur : ".$this->getIdUtilisateur()."\n";
	}
}