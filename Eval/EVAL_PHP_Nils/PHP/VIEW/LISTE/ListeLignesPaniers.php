<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 
$pagnet = PaniersManager::getList(null,["IdClient"=>$_SESSION['utilisateur']->getIdUtilisateur()]);
//Création du template de la grid
echo '<div class="grid-col-4 gridListe">';

echo '<div class="caseListe grid-columns-span-4">Liste des LignesPaniers </div>';

if (count($pagnet)) {
	$objets = LignesPaniersManager::getList(null,["IdPanier"=>$pagnet[0]->getIdPanier()]);
	# code...
	echo '<div class="caseListe">Article</div>';
	echo '<div class="caseListe">Quantite</div>';
	
	//Remplissage de div vide pour la structure de la grid
	echo '<div class="caseListe"></div>';
	echo '<div class="caseListe"></div>';
	
	// Affichage des ennregistrements de la base de données
	foreach($objets as $unObjet)
	{
		echo '<div class="caseListe">'.ArticlesManager::findById($unObjet->getIdArticle())->getLibelleArticle().'</div>';
		echo '<div class="caseListe">'.$unObjet->getQuantite().'</div>';
		
		echo '<div class="caseListe"> <a href="index.php?page=FormLignesPaniers&mode=Modifier&id='.$unObjet->getIdLignePanier().'"><i class="fas fa-pen"></i></a></div>';
		
		echo '<div class="caseListe"> <a href="index.php?page=FormLignesPaniers&mode=Supprimer&id='.$unObjet->getIdLignePanier().'"><i class="fas fa-trash-alt"></i></a></div>';
	}
}else{
	echo '<div class="caseListe centrer grid-columns-span-4">Pas de panier en cours</div>';
}
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-4">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';