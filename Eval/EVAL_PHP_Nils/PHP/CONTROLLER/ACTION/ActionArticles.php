<?php
$elm = new Articles($_POST);
switch ($_GET['mode']) {
	case "Ajouter": {
		// $elm->getPhotos(changeImage());
		$elm = ArticlesManager::add($elm);
		break;
	}
	case "Modifier": {
		$elm = ArticlesManager::update($elm);
		break;
	}
	case "Supprimer": {
		$elm = ArticlesManager::delete($elm);
		break;
	}
}

header("location:index.php?page=ListeArticles");

function changeImage(){
	if(is_uploaded_file($_FILES['Photos']['tmp_name'])){
		$string="IMG/".uniqid('prod_').'.'.explode("/",$_FILES['Photos']['type'])[1];
		move_uploaded_file($_FILES['Photos']['tmp_name'],$lenom);
		return $lenom;
	}
}