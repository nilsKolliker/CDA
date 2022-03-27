<?php
$elm = new Plan_Presences($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_PresencesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_PresencesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_PresencesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Presences");