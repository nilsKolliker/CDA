<?php
$elm = new Plan_Plannings($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_PlanningsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_PlanningsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_PlanningsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Plannings");