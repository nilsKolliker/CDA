<?php
class TexteManager 
{
	public static function findByCodes($codeLangue,$codeTexte)
	{
		$db=DbConnect::getDb();
		$listeAtributs = [];
		$i=0;
		$q = $db->query("SHOW COLUMNS FROM Texte");//fournis toutes les colones de la table Texte
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			if ($donnees != false&&$i>1){//on prend pas les 2 premieres colones
				$listeColonne[] = $donnees["Field"];//on en fait des attributs
			}
			$i++;
		}
		if (array_search($codeLangue,$listeColonne)!==false) {
			$q=$db->prepare("SELECT * FROM Texte WHERE codeTexte =:codeTexte");
			$q->bindValue(":codeTexte", $codeTexte,PDO::PARAM_STR);
			$q->execute();
			$results = $q->fetch(PDO::FETCH_ASSOC);
			if($results != false)
			{
				return $results[$codeLangue];  // on ne retourne que le texte de la langue demandée, pas un objet
			}
			else
			{
				return false;
			}
		}
	}
}