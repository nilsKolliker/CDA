<?php
$elm = new Plan_Formations($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_FormationsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_FormationsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_FormationsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Formations");