<?php
$elm = new VillesFrance($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		$elm = VillesFranceManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = VillesFranceManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = VillesFranceManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListeVillesFrance");