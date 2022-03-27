<?php

class Plan_DistancielsRecurrents 
{

	/*****************Attributs***************** */

	private $_idDistancielRecurrent;
	private $_idJour;
	private $_idAction;
	private static $_attributes=["idDistancielRecurrent","idJour","idAction"];
	/***************** Accesseurs ***************** */


	public function getIdDistancielRecurrent()
	{
		return $this->_idDistancielRecurrent;
	}

	public function setIdDistancielRecurrent(?int $idDistancielRecurrent)
	{
		$this->_idDistancielRecurrent=$idDistancielRecurrent;
	}

	public function getIdJour()
	{
		return $this->_idJour;
	}

	public function setIdJour(int $idJour)
	{
		$this->_idJour=$idJour;
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
		return "IdDistancielRecurrent : ".$this->getIdDistancielRecurrent()."IdJour : ".$this->getIdJour()."IdAction : ".$this->getIdAction()."\n";
	}
}