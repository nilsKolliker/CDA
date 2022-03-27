<?php
$elm = new Plan_Occupations($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_OccupationsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_OccupationsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_OccupationsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Occupations");