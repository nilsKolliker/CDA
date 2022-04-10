<?php

class Plan_Affectations 
{

	/*****************Attributs***************** */

	private $_idAffectation;
	private $_idUtilisateur;
	private $_idAction;
	private $_dateDebut;
	private $_dateFin;
	private static $_attributes=["idAffectation","idUtilisateur","idAction","dateDebut","dateFin"];
	/***************** Accesseurs ***************** */


	public function getIdAffectation()
	{
		return $this->_idAffectation;
	}

	public function setIdAffectation(?int $idAffectation)
	{
		$this->_idAffectation=$idAffectation;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(?int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	public function getIdAction()
	{
		return $this->_idAction;
	}

	public function setIdAction(?int $idAction)
	{
		$this->_idAction=$idAction;
	}

	public function getDateDebut()
	{
		return is_null($this->_dateDebut)?null:$this->_dateDebut->format('Y-m-d');
	}

	public function setDateDebut(string $dateDebut)
	{
		$this->_dateDebut=DateTime::createFromFormat('Y-m-d',$dateDebut);
	}

	public function getDateFin()
	{
		return is_null($this->_dateFin)?null:$this->_dateFin->format('Y-m-d');
	}

	public function setDateFin(string $dateFin)
	{
		$this->_dateFin=DateTime::createFromFormat('Y-m-d',$dateFin);
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
		return "IdAffectation : ".$this->getIdAffectation()."IdUtilisateur : ".$this->getIdUtilisateur()."IdAction : ".$this->getIdAction()."DateDebut : ".$this->getDateDebut()."DateFin : ".$this->getDateFin()."\n";
	}
}