<?php

class Plan_Actions 
{

	/*****************Attributs***************** */

	private $_idAction;
	private $_numOffre;
	private $_dateDebut;
	private $_nbrDHeure;
	private $_nbrStagiaire;
	private $_idTypeMarche;
	private $_tauxHoraire;
	private $_dateDebutCertif;
	private $_dateFinCertif;
	private $_active;
	private $_idCentre;
	private $_idFormation;
	private static $_attributes=["idAction","numOffre","dateDebut","nbrDHeure","nbrStagiaire","idTypeMarche","tauxHoraire","dateDebutCertif","dateFinCertif","active","idCentre","idFormation"];
	/***************** Accesseurs ***************** */


	public function getIdAction()
	{
		return $this->_idAction;
	}

	public function setIdAction(?int $idAction)
	{
		$this->_idAction=$idAction;
	}

	public function getNumOffre()
	{
		return $this->_numOffre;
	}

	public function setNumOffre(int $numOffre)
	{
		$this->_numOffre=$numOffre;
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

	public function getNbrStagiaire()
	{
		return $this->_nbrStagiaire;
	}

	public function setNbrStagiaire(int $nbrStagiaire)
	{
		$this->_nbrStagiaire=$nbrStagiaire;
	}

	public function getIdTypeMarche()
	{
		return $this->_idTypeMarche;
	}

	public function setIdTypeMarche(int $idTypeMarche)
	{
		$this->_idTypeMarche=$idTypeMarche;
	}

	public function getTauxHoraire()
	{
		return $this->_tauxHoraire;
	}

	public function setTauxHoraire(float $tauxHoraire)
	{
		$this->_tauxHoraire=$tauxHoraire;
	}

	public function getDateDebutCertif()
	{
		return is_null($this->_dateDebutCertif)?null:$this->_dateDebutCertif->format('Y-m-d');
	}

	public function setDateDebutCertif(?string $dateDebutCertif)
	{
		$this->_dateDebutCertif=is_null($dateDebutCertif)?null:DateTime::createFromFormat('Y-m-d',$dateDebutCertif);
	}

	public function getDateFinCertif()
	{
		return is_null($this->_dateFinCertif)?null:$this->_dateFinCertif->format('Y-m-d');
	}

	public function setDateFinCertif(?string $dateFinCertif)
	{
		$this->_dateFinCertif=is_null($dateFinCertif)?null:DateTime::createFromFormat('Y-m-d',$dateFinCertif);
	}

	public function getActive()
	{
		return $this->_active;
	}

	public function setActive($active)
	{
		$this->_active=$active!=0;
	}

	public function getIdCentre()
	{
		return $this->_idCentre;
	}

	public function setIdCentre(int $idCentre)
	{
		$this->_idCentre=$idCentre;
	}

	public function getIdFormation()
	{
		return $this->_idFormation;
	}

	public function setIdFormation(int $idFormation)
	{
		$this->_idFormation=$idFormation;
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
		return "IdAction : ".$this->getIdAction()."NumOffre : ".$this->getNumOffre()."DateDebut : ".$this->getDateDebut()."NbrDHeure : ".$this->getNbrDHeure()."NbrStagiaire : ".$this->getNbrStagiaire()."idTypeMarche : ".$this->getIdTypeMarche()."TauxHoraire : ".$this->getTauxHoraire()."DateDebutCertif : ".$this->getDateDebutCertif()."DateFinCertif : ".$this->getDateFinCertif()."Active : ".$this->getActive()."IdCentre : ".$this->getIdCentre()."IdFormation : ".$this->getIdFormation()."\n";
	}
}