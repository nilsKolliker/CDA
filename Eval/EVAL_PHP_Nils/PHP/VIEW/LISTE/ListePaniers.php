<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 
 $objets = PaniersManager::getList();
 //Création du template de la grid
 echo '<div class="grid-col-2 gridListe">';
 
 echo '<div class="caseListe grid-columns-span-2">Liste des LignesPaniers </div>';
 
 if (count($objets)) {
	 # code...
	 echo '<div class="caseListe">Client</div>';
	 echo '<div class="caseListe">Nombre d\'article</div>';
	 
	 //Remplissage de div vide pour la structure de la grid
	 echo '<div class="caseListe"></div>';
	 echo '<div class="caseListe"></div>';
	 
	 // Affichage des ennregistrements de la base de données
	 foreach($objets as $unObjet)
	 {
		 $lignes=$objets = LignesPaniersManager::getList(null,["IdPanier"=>$unObjet->getIdPanier()]);
		 $somme=0;
		 foreach ($lignes as $uneLigne) {
			$somme+=$uneLigne->getQuantite();
		 }
		 $client=UtilisateursManager::findById($unObjet->getIdClient());
		 echo '<div class="caseListe">'.$client->getNom()." ".$client->getPrenom().'</div>';
		 echo '<div class="caseListe">'.$somme.'</div>';
	 }
 }else{
	 echo '<div class="caseListe centrer grid-columns-span-2">Pas de panier en cours</div>';
 }
 //Derniere ligne du tableau (bouton retour)
 echo '<div class="caseListe grid-columns-span-2">
	 <div></div>
	 <a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	 <div></div>
 </div>';
 
 echo'</div>'; //Grid
 echo'</div>'; //Div
 echo '<div class="flex-0-1"></div>';
 echo '</main>';