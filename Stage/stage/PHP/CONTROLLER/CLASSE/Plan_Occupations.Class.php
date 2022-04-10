<?php

class Plan_Occupations 
{

	/*****************Attributs***************** */

	private $_idOccupation;
	private $_idAction;
	private $_idSalle;
	private $_dateDebut;
	private $_dateFin;
	private static $_attributes=["idOccupation","idAction","idSalle","dateDebut","dateFin"];
	/***************** Accesseurs ***************** */


	public function getIdOccupation()
	{
		return $this->_idOccupation;
	}

	public function setIdOccupation(?int $idOccupation)
	{
		$this->_idOccupation=$idOccupation;
	}

	public function getIdAction()
	{
		return $this->_idAction;
	}

	public function setIdAction(?int $idAction)
	{
		$this->_idAction=$idAction;
	}

	public function getIdSalle()
	{
		return $this->_idSalle;
	}

	public function setIdSalle(?int $idSalle)
	{
		$this->_idSalle=$idSalle;
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
		return "IdOccupation : ".$this->getIdOccupation()."IdAction : ".$this->getIdAction()."IdSalle : ".$this->getIdSalle()."DateDebut : ".$this->getDateDebut()."DateFin : ".$this->getDateFin()."\n";
	}
}