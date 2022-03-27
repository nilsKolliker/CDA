<?php
$elm = new Plan_Soustraitances($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_SoustraitancesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_SoustraitancesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_SoustraitancesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Soustraitances");