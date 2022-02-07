<?php
$elm = new LignesPaniers($_POST);

switch ($_GET['mode']) {
	case "Ajouter": {
		if (count(PaniersManager::getList(null,["IdClient"=>$_SESSION['utilisateur']->getIdUtilisateur()]))==0) {
			$date=new DateTime();
			PaniersManager::add(new Paniers(["IdClient"=>$_SESSION['utilisateur']->getIdUtilisateur(),"DatePanier"=>$date->format("Y-m-d"),"AdresseLivraison"=>"ici"]));
		}
		$pagnet=PaniersManager::getList(null,["IdClient"=>$_SESSION['utilisateur']->getIdUtilisateur()])[0];
		$elm->setIdArticle($_GET["idArticle"]);
		$elm->setIdPanier($pagnet->getIdPanier());
		$elm->setQuantite(1);
		$elm = LignesPaniersManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = LignesPaniersManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = LignesPaniersManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListeLignesPaniers");