<?php

class Plan_Utilisateurs 
{

	/*****************Attributs***************** */

	private $_idUtilisateur;
	private $_matricule;
	private $_nom;
	private $_prenom;
	private $_email;
	private $_mdp;
	private $_role;
	private $_idCentre;
	private static $_attributes=["idUtilisateur","matricule","nom","prenom","email","mdp","role","idCentre"];
	/***************** Accesseurs ***************** */


	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(?int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	public function getMatricule()
	{
		return $this->_matricule;
	}

	public function setMatricule(string $matricule)
	{
		$this->_matricule=$matricule;
	}

	public function getNom()
	{
		return $this->_nom;
	}

	public function setNom(string $nom)
	{
		$this->_nom=$nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function setPrenom(string $prenom)
	{
		$this->_prenom=$prenom;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function setEmail(string $email)
	{
		$this->_email=strtolower($email);
	}

	public function getMdp()
	{
		return $this->_mdp;
	}

	public function setMdp(string $mdp)
	{
		$this->_mdp=$mdp;
	}

	public function getRole()
	{
		return $this->_role;
	}

	public function setRole(int $role)
	{
		$this->_role=$role;
	}

	public function getIdCentre()
	{
		return $this->_idCentre;
	}

	public function setIdCentre(int $idCentre)
	{
		$this->_idCentre=$idCentre;
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
		return "IdUtilisateur : ".$this->getIdUtilisateur()."Matricule : ".$this->getMatricule()."Nom : ".$this->getNom()."Prenom : ".$this->getPrenom()."Email : ".$this->getEmail()."Mdp : ".$this->getMdp()."Role : ".$this->getRole()."IdCentre : ".$this->getIdCentre()."\n";
	}
}