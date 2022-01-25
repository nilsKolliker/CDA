<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = VillesFranceManager::getList();
//Création du template de la grid
echo '<div class="grid-col-29 gridListe">';

echo '<div class="caseListe grid-columns-span-29">Liste des VillesFrance </div>';
echo '<div class="caseListe grid-columns-span-29">
<div></div>
<div class="caseListe"><a href="index.php?page=FormVillesFrance&mode=Ajouter"><i class="fas fa-plus"></i></a></div>
<div></div>
</div>';

echo '<div class="caseListe">Ville_departement</div>';
echo '<div class="caseListe">Ville_slug</div>';
echo '<div class="caseListe">Ville_nom</div>';
echo '<div class="caseListe">Ville_nom_simple</div>';
echo '<div class="caseListe">Ville_nom_reel</div>';
echo '<div class="caseListe">Ville_nom_soundex</div>';
echo '<div class="caseListe">Ville_nom_metaphone</div>';
echo '<div class="caseListe">Ville_code_postal</div>';
echo '<div class="caseListe">Ville_commune</div>';
echo '<div class="caseListe">Ville_code_commune</div>';
echo '<div class="caseListe">Ville_arrondissement</div>';
echo '<div class="caseListe">Ville_canton</div>';
echo '<div class="caseListe">Ville_amdi</div>';
echo '<div class="caseListe">Ville_population_2010</div>';
echo '<div class="caseListe">Ville_population_1999</div>';
echo '<div class="caseListe">Ville_population_2012</div>';
echo '<div class="caseListe">Ville_densite_2010</div>';
echo '<div class="caseListe">Ville_surface</div>';
echo '<div class="caseListe">Ville_longitude_deg</div>';
echo '<div class="caseListe">Ville_latitude_deg</div>';
echo '<div class="caseListe">Ville_longitude_grd</div>';
echo '<div class="caseListe">Ville_latitude_grd</div>';
echo '<div class="caseListe">Ville_longitude_dms</div>';
echo '<div class="caseListe">Ville_latitude_dms</div>';
echo '<div class="caseListe">Ville_zmin</div>';
echo '<div class="caseListe">Ville_zmax</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe">'.$unObjet->getVille_departement().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_slug().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_nom().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_nom_simple().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_nom_reel().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_nom_soundex().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_nom_metaphone().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_code_postal().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_commune().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_code_commune().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_arrondissement().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_canton().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_amdi().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_population_2010().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_population_1999().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_population_2012().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_densite_2010().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_surface().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_longitude_deg().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_latitude_deg().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_longitude_grd().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_latitude_grd().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_longitude_dms().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_latitude_dms().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_zmin().'</div>';
echo '<div class="caseListe">'.$unObjet->getVille_zmax().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormVillesFrance&mode=Afficher&id='.$unObjet->getVille_id().'"><i class="fas fa-file-contract"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormVillesFrance&mode=Modifier&id='.$unObjet->getVille_id().'"><i class="fas fa-pen"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormVillesFrance&mode=Supprimer&id='.$unObjet->getVille_id().'"><i class="fas fa-trash-alt"></i></a></div>';
}
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-29">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';