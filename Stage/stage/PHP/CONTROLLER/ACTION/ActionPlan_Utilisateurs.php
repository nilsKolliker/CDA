<?php
$elm = new Plan_Utilisateurs($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm->setMdp(crypte($elm->getMatricule()));
		Plan_UtilisateursManager::add($elm);
		$elm=Plan_UtilisateursManager::getList(null,["matricule"=>$elm->getMatricule()])[0];
		if($elm->getRole()==2){
			for ($i=0; $i <5 ; $i++) { 
				$plan = new Plan_Plannings(["idJour"=>$i,"nbrDHeureMatin"=>$_POST["matin".$i],"nbrDHeureApresMidi"=>$_POST["apresMidi".$i],"idUtilisateur"=>$elm->getIdUtilisateur()]);
				Plan_PlanningsManager::add($plan);
			}
		}
		break;
	}
	case "Modifier": {
		$listeRattachementASupprimer=array_filter($_POST,function($k) {
			return "supprimerRattachement"==explode("_",$k)[0];
		},ARRAY_FILTER_USE_KEY);
		$listeRattachementAUpdate=array_filter($_POST,function($k) {
			return "modifierRattachement"==explode("_",$k)[0];
		},ARRAY_FILTER_USE_KEY);

		$elm->setMdp(Plan_UtilisateursManager::findById($elm->getIdUtilisateur())->getMdp());
		Plan_UtilisateursManager::update($elm);
		if($elm->getRole()==2){
			$listePlaning=Plan_PlanningsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()],"idJour");
			if (count($listePlaning)) {
				for ($i=0; $i <5 ; $i++) { 
					$listePlaning[$i]->setNbrDHeureMatin($_POST["matin".$i]);
					$listePlaning[$i]->setNbrDHeureApresMidi($_POST["apresMidi".$i]);
					Plan_PlanningsManager::update($listePlaning[$i]);
				}
			}else{
				for ($i=0; $i <5 ; $i++) { 
					$plan = new Plan_Plannings(["idJour"=>$i,"nbrDHeureMatin"=>$_POST["matin".$i],"nbrDHeureApresMidi"=>$_POST["apresMidi".$i],"idUtilisateur"=>$elm->getIdUtilisateur()]);
					Plan_PlanningsManager::add($plan);
				}
			}
		}
		foreach ($listeRattachementASupprimer as $keyId => $value) {
			$rattachement=new Plan_Rattachements(["idRattachement"=>explode("_",$keyId)[1]]);
			Plan_RattachementsManager::delete($rattachement);
		}
		foreach ($listeRattachementAUpdate as $keyId => $centre) {
			$rattachement=new Plan_Rattachements(["idRattachement"=>explode("_",$keyId)[1],"idUtilisateur"=>$elm->getIdUtilisateur(),"idCentre"=>$centre]);
			Plan_RattachementsManager::update($rattachement);
		}

		break;
	}
	case "Supprimer": {
		$listePlaning=Plan_PlanningsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
		$listeRattachement=Plan_RattachementsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
		foreach ($listePlaning as $planing) {
			Plan_PlanningsManager::delete($planing);
		}
		foreach ($listeRattachement as $rattachement) {
			Plan_RattachementsManager::delete($rattachement);
		}
		$elm = Plan_UtilisateursManager::delete($elm);
		break;
	}
}
if ($_GET['mode']!="Supprimer") {
	$listeNouveauCentre=array_filter($_POST,function($k) {
		return "ajouterRattachement"==explode("_",$k)[0];
	},ARRAY_FILTER_USE_KEY);
	foreach ($listeNouveauCentre as $nouveauCentre) {
		$rattachement=new Plan_Rattachements(["idUtilisateur"=>$elm->getIdUtilisateur(),"idCentre"=>$nouveauCentre]);
		Plan_RattachementsManager::add($rattachement);
	}
}

header("location:index.php?page=ListePlan_Utilisateurs");