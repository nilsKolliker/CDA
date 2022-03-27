<?php
$elm = new Plan_Organismes($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_OrganismesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_OrganismesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_OrganismesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Organismes");