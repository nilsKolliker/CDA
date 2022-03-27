<?php
$elm = new Plan_Utilisateurs($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm->setMdp(crypte($elm->getMdp()));
		$elm = Plan_UtilisateursManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_UtilisateursManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_UtilisateursManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Utilisateurs");