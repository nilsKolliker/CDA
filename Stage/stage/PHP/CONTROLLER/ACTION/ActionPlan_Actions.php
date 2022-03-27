<?php
$elm = new Plan_Actions($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_ActionsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_ActionsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_ActionsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Actions");