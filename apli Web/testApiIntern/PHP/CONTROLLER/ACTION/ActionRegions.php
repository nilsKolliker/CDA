<?php
$elm = new Regions($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = RegionsManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = RegionsManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = RegionsManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListeRegions");