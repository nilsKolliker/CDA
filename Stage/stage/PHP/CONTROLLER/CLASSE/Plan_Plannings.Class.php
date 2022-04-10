<?php

class Plan_Plannings 
{

	/*****************Attributs***************** */

	private $_idPlanning;
	private $_idJour;
	private $_heureMatinDebut;
	private $_heureMatinFin;
	private $_heureApresMidiDebut;
	private $_heureApresMidiFin;
	private $_idAction;
	private $_idUtilisateur;
	private static $_attributes=["idPlanning","idJour","heureMatinDebut","heureMatinFin","heureApresMidiDebut","heureApresMidiFin","idAction","idUtilisateur"];
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

	public function getHeureMatinDebut()
	{
		return is_null($this->_heureMatinDebut)?null:$this->_heureMatinDebut->format('%H:%I');
	}

	public function setHeureMatinDebut(?string $heureMatinDebut)
	{
		if($heureMatinDebut){
			list($hours, $minutes)= sscanf($heureMatinDebut,'%d:%d');
			$this->_heureMatinDebut=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}else{
			$this->_heureMatinDebut=null;
		}
	}

	public function getHeureMatinFin()
	{
		return is_null($this->_heureMatinFin)?null:$this->_heureMatinFin->format('%H:%I');
	}

	public function setHeureMatinFin(?string $heureMatinFin)
	{
		if($heureMatinFin){
			list($hours, $minutes)= sscanf($heureMatinFin,'%d:%d');
			$this->_heureMatinFin=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}else{
			$this->_heureMatinFin=null;
		}
	}

	public function getHeureApresMidiDebut()
	{
		return is_null($this->_heureApresMidiDebut)?null:$this->_heureApresMidiDebut->format('%H:%I');
	}

	public function setHeureApresMidiDebut(?string $heureApresMidiDebut)
	{
		if($heureApresMidiDebut){
			list($hours, $minutes)= sscanf($heureApresMidiDebut,'%d:%d');
			$this->_heureApresMidiDebut=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}else{
			$this->_heureApresMidiDebut=null;
		}
	}

	public function getHeureApresMidiFin()
	{
		return is_null($this->_heureApresMidiFin)?null:$this->_heureApresMidiFin->format('%H:%I');
	}

	public function setHeureApresMidiFin(?string $heureApresMidiFin)
	{
		if($heureApresMidiFin){
			list($hours, $minutes)= sscanf($heureApresMidiFin,'%d:%d');
			$this->_heureApresMidiFin=new DateInterval(sprintf('PT%dH%dM',$hours,$minutes));
		}else{
			$this->_heureApresMidiFin=null;
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

}