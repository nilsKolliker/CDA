<?php
$elm = new Plan_Absences($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_AbsencesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_AbsencesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_AbsencesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_Absences");