<?php

class Plan_Plannings 
{

	/*****************Attributs***************** */

	private $_idPlanning;
	private $_idJour;
	private $_nbrDHeureMatin;
	private $_nbrDHeureApresMidi;
	private $_idAction;
	private $_idUtilisateur;
	private static $_attributes=["idPlanning","idJour","nbrDHeureMatin","nbrDHeureApresMidi","idAction","idUtilisateur"];
	/***************** Accesseurs ***************** */


	public function getIdPlanning()
	{
		return $this->_idPlanning;
	}

	public function setIdPlanning(?int $idPlanning)
	{
		$this->_idPlanning=$idPlanning;
	}

	public function getIdJour()
	{
		return $this->_idJour;
	}

	public function setIdJour(int $idJour)
	{
		$this->_idJour=$idJour;
	}

	public function getNbrDHeureMatin()
	{
		return is_null($this->_nbrDHeureMatin)?null:$this->_nbrDHeureMatin->format('%H:%I');
	}

	public function setNbrDHeureMatin(?string $nbrDHeureMatin)
	{
		if(is_null($nbrDHeureMatin)){
			$this->_nbrDHeureMatin=null;
		}else{
			list($hours, $minutes)= sscanf($nbrDHeureMatin,'%d:%d');
			$this->_nbrDHeureMatin=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}
	}

	public function getNbrDHeureApresMidi()
	{
		return is_null($this->_nbrDHeureApresMidi)?null:$this->_nbrDHeureApresMidi->format('%H:%I');
	}

	public function setNbrDHeureApresMidi(?string $nbrDHeureApresMidi)
	{
		if(is_null($nbrDHeureApresMidi)){
			$this->_nbrDHeureApresMidi=null;
		}else{
			list($hours, $minutes)= sscanf($nbrDHeureApresMidi,'%d:%d');
			$this->_nbrDHeureApresMidi=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}
	}

	public function getIdAction()
	{
		return $this->_idAction;
	}

	public function setIdAction(?int $idAction)
	{
		$this->_idAction=$idAction;
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
		return "IdPlanning : ".$this->getIdPlanning()."IdJour : ".$this->getIdJour()."NbrDHeureMatin : ".$this->getNbrDHeureMatin()."NbrDHeureApresMidi : ".$this->getNbrDHeureApresMidi()."IdAction : ".$this->getIdAction()."IdUtilisateur : ".$this->getIdUtilisateur()."\n";
	}
}