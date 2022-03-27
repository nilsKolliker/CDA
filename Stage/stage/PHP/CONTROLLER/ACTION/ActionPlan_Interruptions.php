<?php
$elm = new Plan_Interruptions($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_InterruptionsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_InterruptionsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_InterruptionsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Interruptions");