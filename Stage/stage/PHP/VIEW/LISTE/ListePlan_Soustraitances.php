<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_SoustraitancesManager::getList();
//Création du template de la grid
echo '<div class="grid-col-7 gridListe">';

echo '<div class="caseListe titreListe grid-columns-span-7">Liste des Plan_Soustraitances </div>';
echo '<div class="caseListe grid-columns-span-7">
<div></div>
<div class="caseListe"><a href="index.php?page=FormPlan_Soustraitances&mode=Ajouter"><i class="fas fa-plus"></i></a></div>
<div></div>
</div>';

echo '<div class="caseListe labelListe">IdUtilisateur</div>';
echo '<div class="caseListe labelListe">IdOrganisme</div>';
echo '<div class="caseListe labelListe">DateDebut</div>';
echo '<div class="caseListe labelListe">DateFin</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getIdUtilisateur().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getIdOrganisme().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateDebut().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateFin().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Soustraitances&mode=Afficher&id='.$unObjet->getIdSousTraitance().'"><i class="fas fa-file-contract"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Soustraitances&mode=Modifier&id='.$unObjet->getIdSousTraitance().'"><i class="fas fa-pen"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Soustraitances&mode=Supprimer&id='.$unObjet->getIdSousTraitance().'"><i class="fas fa-trash-alt"></i></a></div>';
}
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-7">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';