<?php
$elm = new Plan_DistancielsRecurrents($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_DistancielsRecurrentsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_DistancielsRecurrentsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_DistancielsRecurrentsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_DistancielsRecurrents");