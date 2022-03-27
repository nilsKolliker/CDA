<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_PresencesManager::getList();
//Création du template de la grid
echo '<div class="grid-col-7 gridListe">';

echo '<div class="caseListe titreListe grid-columns-span-7">Liste des Plan_Presences </div>';
echo '<div class="caseListe grid-columns-span-7">
<div></div>
<div class="caseListe"><a href="index.php?page=FormPlan_Presences&mode=Ajouter"><i class="fas fa-plus"></i></a></div>
<div></div>
</div>';

echo '<div class="caseListe labelListe">DateJour</div>';
echo '<div class="caseListe labelListe">NbrStagiaireMatin</div>';
echo '<div class="caseListe labelListe">NbrStagiaireApresMidi</div>';
echo '<div class="caseListe labelListe">IdAction</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getDateJour().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getNbrStagiaireMatin().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getNbrStagiaireApresMidi().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getIdAction().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Presences&mode=Afficher&id='.$unObjet->getIdPresence().'"><i class="fas fa-file-contract"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Presences&mode=Modifier&id='.$unObjet->getIdPresence().'"><i class="fas fa-pen"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Presences&mode=Supprimer&id='.$unObjet->getIdPresence().'"><i class="fas fa-trash-alt"></i></a></div>';
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