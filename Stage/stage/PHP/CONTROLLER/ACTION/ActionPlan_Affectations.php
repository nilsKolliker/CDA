<?php
$elm = new Plan_Affectations($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_AffectationsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_AffectationsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_AffectationsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Affectations");