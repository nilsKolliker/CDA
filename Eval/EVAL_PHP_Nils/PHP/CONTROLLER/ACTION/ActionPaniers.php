<?php
$elm = new Paniers($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = PaniersManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = PaniersManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = PaniersManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListePaniers");