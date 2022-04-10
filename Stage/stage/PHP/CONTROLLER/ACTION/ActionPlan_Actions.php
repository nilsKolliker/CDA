<?php
$elm = new Plan_Actions($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		Plan_ActionsManager::add($elm);
		$elm=Plan_ActionsManager::getList(null,["numOffre"=>$elm->getNumOffre()])[0];
		for ($i=0; $i <5 ; $i++) { 
			if ($_POST["matinD".$i]||$_POST["matinF".$i]||$_POST["apresMidiD".$i]||$_POST["apresMidiF".$i]) {
				$plan = new Plan_Plannings(["idJour"=>$i,"heureMatinDebut"=>$_POST["matinD".$i],"heureMatinFin"=>$_POST["matinF".$i],"heureApresMidiDebut"=>$_POST["apresMidiD".$i],"heureApresMidiFin"=>$_POST["apresMidiF".$i],"idAction"=>$elm->getIdAction()]);
				Plan_PlanningsManager::add($plan);
			}
		}
		break;
	}
	case "Modifier": {
		Plan_ActionsManager::update($elm);
		for ($i=0; $i <5 ; $i++) {
			$planing=Plan_PlanningsManager::getList(null,["idAction"=>$elm->getIdAction(),"idJour"=>$i],"idJour");
			if ($_POST["matinD".$i]||$_POST["matinF".$i]||$_POST["apresMidiD".$i]||$_POST["apresMidiF".$i]) {
				if (count($planing)) {
					$planing[0]->setHeureMatinDebut($_POST["matinD".$i]);
					$planing[0]->setHeureMatinFin($_POST["matinF".$i]);
					$planing[0]->setHeureApresMidiDebut($_POST["apresMidiD".$i]);
					$planing[0]->setHeureApresMidiFin($_POST["apresMidiF".$i]);
					Plan_PlanningsManager::update($planing[0]);	
				}else {
					$plan = new Plan_Plannings(["idJour"=>$i,"heureMatinDebut"=>$_POST["matinD".$i],"heureMatinFin"=>$_POST["matinF".$i],"heureApresMidiDebut"=>$_POST["apresMidiD".$i],"heureApresMidiFin"=>$_POST["apresMidiF".$i],"idAction"=>$elm->getIdAction()]);
					Plan_PlanningsManager::add($plan);
				}

			}else{
				if (count($planing))Plan_PlanningsManager::delete($planing[0]);
			}
		}
		break;
	}
	case "Supprimer": {
		$listePlaning=Plan_PlanningsManager::getList(null,["idAction"=>$elm->getIdAction()]);
		foreach ($listePlaning as $planing) {
			Plan_PlanningsManager::delete($planing);
		}
		$elm = Plan_ActionsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Actions");