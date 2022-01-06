<?php
class TexteManager 
{
	public static function findByCodes($codeLangue,$codeTexte)
	{
		$db=DbConnect::getDb();
		$r = $db->prepare("SHOW COLUMNS FROM Texte WHERE Field=:codeLangue");//fournis la colone de la table Texte correspondant au codeLangue
		$r->bindValue(":codeLangue", $codeLangue,PDO::PARAM_STR);
		$r->execute();
		
		if ($r->fetch(PDO::FETCH_ASSOC)) {//on cherche le texte que si le code existe
			$q=$db->prepare("SELECT * FROM Texte WHERE codeTexte =:codeTexte");
			$q->bindValue(":codeTexte", $codeTexte,PDO::PARAM_STR);
			$q->execute();
			$results = $q->fetch(PDO::FETCH_ASSOC);
			if($results != false)
			{
				return $results[$codeLangue];//on ne retourne que le texte de la langue demandée, pas un objet
			}
			else
			{
				return false;
			}
		}
	}
}