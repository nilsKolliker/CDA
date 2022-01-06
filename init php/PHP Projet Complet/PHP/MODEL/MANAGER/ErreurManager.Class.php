<?php
class ErreurManager 
{
	public static function findByCodes($codeErreur)
	{
		$db=DbConnect::getDb();
        $q=$db->prepare("SELECT texteErreur FROM Erreurs WHERE codeErreur =:codeErreur");
        $q->bindValue(":codeErreur", $codeErreur,PDO::PARAM_STR);
        $q->execute();
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if($results != false)
        {
            return $results["texteErreur"];//on ne retourne que le texte de l'erreur demandée, pas un objet
        }
        else
        {
            return false;
        }
		
	}
}