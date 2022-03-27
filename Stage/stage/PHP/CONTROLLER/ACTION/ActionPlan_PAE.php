<?php
$elm = new Plan_PAE($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_PAEManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_PAEManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_PAEManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_PAE");