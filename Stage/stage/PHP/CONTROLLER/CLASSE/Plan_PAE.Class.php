<?php

class Plan_PAE 
{

	/*****************Attributs***************** */

	private $_idPAE;
	private $_dateDebut;
	private $_nbrDHeure;
	private $_idAction;
	private static $_attributes=["idPAE","dateDebut","nbrDHeure","idAction"];
	/***************** Accesseurs ***************** */


	public function getIdPAE()
	{
		return $this->_idPAE;
	}

	public function setIdPAE(?int $idPAE)
	{
		$this->_idPAE=$idPAE;
	}

	public function getDateDebut()
	{
		return is_null($this->_dateDebut)?null:$this->_dateDebut->format('Y-m-d');
	}

	public function setDateDebut(string $dateDebut)
	{
		$this->_dateDebut=DateTime::createFromFormat('Y-m-d',$dateDebut);
	}

	public function getNbrDHeure()
	{
		return $this->_nbrDHeure;
	}

	public function setNbrDHeure(int $nbrDHeure)
	{
		$this->_nbrDHeure=$nbrDHeure;
	}

	public function getIdAction()
	{
		return $this->_idAction;
	}

	public function setIdAction(int $idAction)
	{
		$this->_idAction=$idAction;
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
		return "IdPAE : ".$this->getIdPAE()."DateDebut : ".$this->getDateDebut()."NbrDHeure : ".$this->getNbrDHeure()."IdAction : ".$this->getIdAction()."\n";
	}
}