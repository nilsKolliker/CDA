<?php
$elm = new Plan_Utilisateurs($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm->setMdp(crypte($elm->getMatricule()));
		Plan_UtilisateursManager::add($elm);
		$elm=Plan_UtilisateursManager::getList(null,["matricule"=>$elm->getMatricule()])[0];
		if($elm->getRole()==2){
			for ($i=0; $i <5 ; $i++) { 
				if ($_POST["matinD".$i]||$_POST["matinF".$i]||$_POST["apresMidiD".$i]||$_POST["apresMidiF".$i]) {
					$plan = new Plan_Plannings(["idJour"=>$i,"heureMatinDebut"=>$_POST["matinD".$i],"heureMatinFin"=>$_POST["matinF".$i],"heureApresMidiDebut"=>$_POST["apresMidiD".$i],"heureApresMidiFin"=>$_POST["apresMidiF".$i],"idUtilisateur"=>$elm->getIdUtilisateur()]);
					Plan_PlanningsManager::add($plan);
				}
			}
			$listeAbsenceAAdd=array_filter($_POST,function($k) {
				return "ajouterAbsenceDebut"==explode("_",$k)[0];
			},ARRAY_FILTER_USE_KEY);
			foreach ($listeAbsenceAAdd as $keyId => $dateDebut) {
				$absence=new Plan_Absences(["idUtilisateur"=>$elm->getIdUtilisateur(),"dateDebut"=>$dateDebut,"dateFin"=>$_POST["ajouterAbsenceFin_".explode("_",$keyId)[1]],"typeDAbsence"=>0]);
				Plan_AbsencesManager::add($absence);
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
			for ($i=0; $i <5 ; $i++) {
				$planing=Plan_PlanningsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur(),"idJour"=>$i],"idJour");
				if ($_POST["matinD".$i]||$_POST["matinF".$i]||$_POST["apresMidiD".$i]||$_POST["apresMidiF".$i]) {
					if (count($planing)) {
						$planing[0]->setHeureMatinDebut($_POST["matinD".$i]);
						$planing[0]->setHeureMatinFin($_POST["matinF".$i]);
						$planing[0]->setHeureApresMidiDebut($_POST["apresMidiD".$i]);
						$planing[0]->setHeureApresMidiFin($_POST["apresMidiF".$i]);
						Plan_PlanningsManager::update($planing[0]);	
					}else {
						$plan = new Plan_Plannings(["idJour"=>$i,"heureMatinDebut"=>$_POST["matinD".$i],"heureMatinFin"=>$_POST["matinF".$i],"heureApresMidiDebut"=>$_POST["apresMidiD".$i],"heureApresMidiFin"=>$_POST["apresMidiF".$i],"idUtilisateur"=>$elm->getIdUtilisateur()]);
						Plan_PlanningsManager::add($plan);
					}

				}else{
					if (count($planing))Plan_PlanningsManager::delete($planing[0]);
				}
			}

			$listeAbsenceASupprimer=array_filter($_POST,function($k) {
				return "supprimerAbsenceDebut"==explode("_",$k)[0];
			},ARRAY_FILTER_USE_KEY);
			$listeAbsenceAUpdate=array_filter($_POST,function($k) {
				return "modifierAbsenceDebut"==explode("_",$k)[0];
			},ARRAY_FILTER_USE_KEY);
			$listeAbsenceAAdd=array_filter($_POST,function($k) {
				return "ajouterAbsenceDebut"==explode("_",$k)[0];
			},ARRAY_FILTER_USE_KEY);
			foreach ($listeAbsenceASupprimer as $keyId => $value) {
				$absence=new Plan_Absences(["idAbsence"=>explode("_",$keyId)[1]]);
				Plan_AbsencesManager::delete($absence);
			}
			foreach ($listeAbsenceAUpdate as $keyId => $dateDebut) {
				$absence=new Plan_Absences(["idAbsence"=>explode("_",$keyId)[1],"idUtilisateur"=>$elm->getIdUtilisateur(),"dateDebut"=>$dateDebut,"dateFin"=>$_POST["modifierAbsenceFin_".explode("_",$keyId)[1]],"typeDAbsence"=>0]);
				Plan_AbsencesManager::update($absence);
			}
			foreach ($listeAbsenceAAdd as $keyId => $dateDebut) {
				$absence=new Plan_Absences(["idUtilisateur"=>$elm->getIdUtilisateur(),"dateDebut"=>$dateDebut,"dateFin"=>$_POST["ajouterAbsenceFin_".explode("_",$keyId)[1]],"typeDAbsence"=>0]);
				Plan_AbsencesManager::add($absence);
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
		$listeAbsence=Plan_AbsencesManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
		$listePlaning=Plan_PlanningsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
		$listeRattachement=Plan_RattachementsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
		foreach ($listeAbsence as $absence) {
			Plan_AbsencesManager::delete($absence);
		}
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