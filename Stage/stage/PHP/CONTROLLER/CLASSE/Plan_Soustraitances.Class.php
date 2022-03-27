<?php

class Plan_Soustraitances 
{

	/*****************Attributs***************** */

	private $_idSousTraitance;
	private $_idUtilisateur;
	private $_idOrganisme;
	private $_dateDebut;
	private $_dateFin;
	private static $_attributes=["idSousTraitance","idUtilisateur","idOrganisme","dateDebut","dateFin"];
	/***************** Accesseurs ***************** */


	public function getIdSousTraitance()
	{
		return $this->_idSousTraitance;
	}

	public function setIdSousTraitance(?int $idSousTraitance)
	{
		$this->_idSousTraitance=$idSousTraitance;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(?int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	public function getIdOrganisme()
	{
		return $this->_idOrganisme;
	}

	public function setIdOrganisme(?int $idOrganisme)
	{
		$this->_idOrganisme=$idOrganisme;
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
		return $this->_dateFin;
	}

	public function setDateFin(?string $dateFin)
	{
		$this->_dateFin=$dateFin;
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
		return "IdSousTraitance : ".$this->getIdSousTraitance()."IdUtilisateur : ".$this->getIdUtilisateur()."IdOrganisme : ".$this->getIdOrganisme()."DateDebut : ".$this->getDateDebut()."DateFin : ".$this->getDateFin()."\n";
	}
}