<?php
$elm = new Plan_Salles($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_SallesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_SallesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_SallesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Salles");