<?php
$elm = new Plan_Rattachements($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_RattachementsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_RattachementsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_RattachementsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Rattachements");