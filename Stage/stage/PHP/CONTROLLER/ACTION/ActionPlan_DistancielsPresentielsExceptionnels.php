<?php
$elm = new Plan_DistancielsPresentielsExceptionnels($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = Plan_DistancielsPresentielsExceptionnelsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = Plan_DistancielsPresentielsExceptionnelsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = Plan_DistancielsPresentielsExceptionnelsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePlan_DistancielsPresentielsExceptionnels");