<?php

class Plan_Presences 
{

	/*****************Attributs***************** */

	private $_idPresence;
	private $_dateJour;
	private $_nbrStagiaireMatin;
	private $_nbrStagiaireApresMidi;
	private $_idAction;
	private static $_attributes=["idPresence","dateJour","nbrStagiaireMatin","nbrStagiaireApresMidi","idAction"];
	/***************** Accesseurs ***************** */


	public function getIdPresence()
	{
		return $this->_idPresence;
	}

	public function setIdPresence(?int $idPresence)
	{
		$this->_idPresence=$idPresence;
	}

	public function getDateJour()
	{
		return is_null($this->_dateJour)?null:$this->_dateJour->format('Y-m-d');
	}

	public function setDateJour(string $dateJour)
	{
		$this->_dateJour=DateTime::createFromFormat('Y-m-d',$dateJour);
	}

	public function getNbrStagiaireMatin()
	{
		return $this->_nbrStagiaireMatin;
	}

	public function setNbrStagiaireMatin(?int $nbrStagiaireMatin)
	{
		$this->_nbrStagiaireMatin=$nbrStagiaireMatin;
	}

	public function getNbrStagiaireApresMidi()
	{
		return $this->_nbrStagiaireApresMidi;
	}

	public function setNbrStagiaireApresMidi(?int $nbrStagiaireApresMidi)
	{
		$this->_nbrStagiaireApresMidi=$nbrStagiaireApresMidi;
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
		return "IdPresence : ".$this->getIdPresence()."DateJour : ".$this->getDateJour()."NbrStagiaireMatin : ".$this->getNbrStagiaireMatin()."NbrStagiaireApresMidi : ".$this->getNbrStagiaireApresMidi()."IdAction : ".$this->getIdAction()."\n";
	}
}