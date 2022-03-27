<?php
$elm = new Plan_Centres($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_CentresManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_CentresManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_CentresManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Centres");