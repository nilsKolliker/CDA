<?php

class VillesFrance 
{

	/*****************Attributs***************** */

	private $_ville_id;
	private $_ville_departement;
	private $_ville_slug;
	private $_ville_nom;
	private $_ville_nom_simple;
	private $_ville_nom_reel;
	private $_ville_nom_soundex;
	private $_ville_nom_metaphone;
	private $_ville_code_postal;
	private $_ville_commune;
	private $_ville_code_commune;
	private $_ville_arrondissement;
	private $_ville_canton;
	private $_ville_amdi;
	private $_ville_population_2010;
	private $_ville_population_1999;
	private $_ville_population_2012;
	private $_ville_densite_2010;
	private $_ville_surface;
	private $_ville_longitude_deg;
	private $_ville_latitude_deg;
	private $_ville_longitude_grd;
	private $_ville_latitude_grd;
	private $_ville_longitude_dms;
	private $_ville_latitude_dms;
	private $_ville_zmin;
	private $_ville_zmax;
	private static $_attributes=["ville_id","ville_departement","ville_slug","ville_nom","ville_nom_simple","ville_nom_reel","ville_nom_soundex","ville_nom_metaphone","ville_code_postal","ville_commune","ville_code_commune","ville_arrondissement","ville_canton","ville_amdi","ville_population_2010","ville_population_1999","ville_population_2012","ville_densite_2010","ville_surface","ville_longitude_deg","ville_latitude_deg","ville_longitude_grd","ville_latitude_grd","ville_longitude_dms","ville_latitude_dms","ville_zmin","ville_zmax"];
	/***************** Accesseurs ***************** */


	public function getVille_id()
	{
		return $this->_ville_id;
	}

	public function setVille_id(int $ville_id)
	{
		$this->_ville_id=$ville_id;
	}

	public function getVille_departement()
	{
		return $this->_ville_departement;
	}

	public function setVille_departement(?string $ville_departement)
	{
		$this->_ville_departement=$ville_departement;
	}

	public function getVille_slug()
	{
		return $this->_ville_slug;
	}

	public function setVille_slug(?string $ville_slug)
	{
		$this->_ville_slug=$ville_slug;
	}

	public function getVille_nom()
	{
		return $this->_ville_nom;
	}

	public function setVille_nom(?string $ville_nom)
	{
		$this->_ville_nom=$ville_nom;
	}

	public function getVille_nom_simple()
	{
		return $this->_ville_nom_simple;
	}

	public function setVille_nom_simple(?string $ville_nom_simple)
	{
		$this->_ville_nom_simple=$ville_nom_simple;
	}

	public function getVille_nom_reel()
	{
		return $this->_ville_nom_reel;
	}

	public function setVille_nom_reel(?string $ville_nom_reel)
	{
		$this->_ville_nom_reel=$ville_nom_reel;
	}

	public function getVille_nom_soundex()
	{
		return $this->_ville_nom_soundex;
	}

	public function setVille_nom_soundex(?string $ville_nom_soundex)
	{
		$this->_ville_nom_soundex=$ville_nom_soundex;
	}

	public function getVille_nom_metaphone()
	{
		return $this->_ville_nom_metaphone;
	}

	public function setVille_nom_metaphone(?string $ville_nom_metaphone)
	{
		$this->_ville_nom_metaphone=$ville_nom_metaphone;
	}

	public function getVille_code_postal()
	{
		return $this->_ville_code_postal;
	}

	public function setVille_code_postal(?string $ville_code_postal)
	{
		$this->_ville_code_postal=$ville_code_postal;
	}

	public function getVille_commune()
	{
		return $this->_ville_commune;
	}

	public function setVille_commune(?string $ville_commune)
	{
		$this->_ville_commune=$ville_commune;
	}

	public function getVille_code_commune()
	{
		return $this->_ville_code_commune;
	}

	public function setVille_code_commune(string $ville_code_commune)
	{
		$this->_ville_code_commune=$ville_code_commune;
	}

	public function getVille_arrondissement()
	{
		return $this->_ville_arrondissement;
	}

	public function setVille_arrondissement(?int $ville_arrondissement)
	{
		$this->_ville_arrondissement=$ville_arrondissement;
	}

	public function getVille_canton()
	{
		return $this->_ville_canton;
	}

	public function setVille_canton(?string $ville_canton)
	{
		$this->_ville_canton=$ville_canton;
	}

	public function getVille_amdi()
	{
		return $this->_ville_amdi;
	}

	public function setVille_amdi(?int $ville_amdi)
	{
		$this->_ville_amdi=$ville_amdi;
	}

	public function getVille_population_2010()
	{
		return $this->_ville_population_2010;
	}

	public function setVille_population_2010(?int $ville_population_2010)
	{
		$this->_ville_population_2010=$ville_population_2010;
	}

	public function getVille_population_1999()
	{
		return $this->_ville_population_1999;
	}

	public function setVille_population_1999(?int $ville_population_1999)
	{
		$this->_ville_population_1999=$ville_population_1999;
	}

	public function getVille_population_2012()
	{
		return $this->_ville_population_2012;
	}

	public function setVille_population_2012(?int $ville_population_2012)
	{
		$this->_ville_population_2012=$ville_population_2012;
	}

	public function getVille_densite_2010()
	{
		return $this->_ville_densite_2010;
	}

	public function setVille_densite_2010(?int $ville_densite_2010)
	{
		$this->_ville_densite_2010=$ville_densite_2010;
	}

	public function getVille_surface()
	{
		return $this->_ville_surface;
	}

	public function setVille_surface(?float $ville_surface)
	{
		$this->_ville_surface=$ville_surface;
	}

	public function getVille_longitude_deg()
	{
		return $this->_ville_longitude_deg;
	}

	public function setVille_longitude_deg(?float $ville_longitude_deg)
	{
		$this->_ville_longitude_deg=$ville_longitude_deg;
	}

	public function getVille_latitude_deg()
	{
		return $this->_ville_latitude_deg;
	}

	public function setVille_latitude_deg(?float $ville_latitude_deg)
	{
		$this->_ville_latitude_deg=$ville_latitude_deg;
	}

	public function getVille_longitude_grd()
	{
		return $this->_ville_longitude_grd;
	}

	public function setVille_longitude_grd(?string $ville_longitude_grd)
	{
		$this->_ville_longitude_grd=$ville_longitude_grd;
	}

	public function getVille_latitude_grd()
	{
		return $this->_ville_latitude_grd;
	}

	public function setVille_latitude_grd(?string $ville_latitude_grd)
	{
		$this->_ville_latitude_grd=$ville_latitude_grd;
	}

	public function getVille_longitude_dms()
	{
		return $this->_ville_longitude_dms;
	}

	public function setVille_longitude_dms(?string $ville_longitude_dms)
	{
		$this->_ville_longitude_dms=$ville_longitude_dms;
	}

	public function getVille_latitude_dms()
	{
		return $this->_ville_latitude_dms;
	}

	public function setVille_latitude_dms(?string $ville_latitude_dms)
	{
		$this->_ville_latitude_dms=$ville_latitude_dms;
	}

	public function getVille_zmin()
	{
		return $this->_ville_zmin;
	}

	public function setVille_zmin(?int $ville_zmin)
	{
		$this->_ville_zmin=$ville_zmin;
	}

	public function getVille_zmax()
	{
		return $this->_ville_zmax;
	}

	public function setVille_zmax(?int $ville_zmax)
	{
		$this->_ville_zmax=$ville_zmax;
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
		return "Ville_id : ".$this->getVille_id()."Ville_departement : ".$this->getVille_departement()."Ville_slug : ".$this->getVille_slug()."Ville_nom : ".$this->getVille_nom()."Ville_nom_simple : ".$this->getVille_nom_simple()."Ville_nom_reel : ".$this->getVille_nom_reel()."Ville_nom_soundex : ".$this->getVille_nom_soundex()."Ville_nom_metaphone : ".$this->getVille_nom_metaphone()."Ville_code_postal : ".$this->getVille_code_postal()."Ville_commune : ".$this->getVille_commune()."Ville_code_commune : ".$this->getVille_code_commune()."Ville_arrondissement : ".$this->getVille_arrondissement()."Ville_canton : ".$this->getVille_canton()."Ville_amdi : ".$this->getVille_amdi()."Ville_population_2010 : ".$this->getVille_population_2010()."Ville_population_1999 : ".$this->getVille_population_1999()."Ville_population_2012 : ".$this->getVille_population_2012()."Ville_densite_2010 : ".$this->getVille_densite_2010()."Ville_surface : ".$this->getVille_surface()."Ville_longitude_deg : ".$this->getVille_longitude_deg()."Ville_latitude_deg : ".$this->getVille_latitude_deg()."Ville_longitude_grd : ".$this->getVille_longitude_grd()."Ville_latitude_grd : ".$this->getVille_latitude_grd()."Ville_longitude_dms : ".$this->getVille_longitude_dms()."Ville_latitude_dms : ".$this->getVille_latitude_dms()."Ville_zmin : ".$this->getVille_zmin()."Ville_zmax : ".$this->getVille_zmax()."\n";
	}
}