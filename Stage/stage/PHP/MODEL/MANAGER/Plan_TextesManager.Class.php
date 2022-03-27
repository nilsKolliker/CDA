<?php

class Plan_TextesManager
{

	public static function findByCodes($codeLangue,$codeTexte)
	{
		 $texte=DAO::select([$codeLangue],"Plan_Textes",["codeTexte" => $codeTexte],null,null,true);
		 if($texte==false) return false;
		 return $texte[0][$codeLangue];
	}

	public static function checkIfLangExist($codeLangue)
	{
		$db=DbConnect::getDb();
		$q=$db->prepare("SHOW COLUMNS FROM Plan_Textes LIKE :codeLangue");
		$q->bindValue(":codeLangue", $codeLangue, PDO::PARAM_STR);
		$q->execute();
		$results = $q->fetch(PDO::FETCH_ASSOC);
		return ($results != false); // renvoi vrai si la requete retourne des données, false sinon
	}
}