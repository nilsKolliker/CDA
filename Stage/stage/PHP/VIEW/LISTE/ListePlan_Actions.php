<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_ActionsManager::getList();
//Création du template de la grid
echo '<div class="grid-col-14 gridListe">';

echo '<div class="caseListe titreListe grid-columns-span-14">Liste des Plan_Actions </div>';
echo '<div class="caseListe grid-columns-span-14">
<div></div>
<div class="caseListe"><a href="index.php?page=FormPlan_Actions&mode=Ajouter"><i class="fas fa-plus"></i></a></div>
<div></div>
</div>';

echo '<div class="caseListe labelListe">NumOffre</div>';
echo '<div class="caseListe labelListe">DateDebut</div>';
echo '<div class="caseListe labelListe">NbrDHeure</div>';
echo '<div class="caseListe labelListe">NbrStagiaire</div>';
echo '<div class="caseListe labelListe">TypeMarche</div>';
echo '<div class="caseListe labelListe">TauxHoraire</div>';
echo '<div class="caseListe labelListe">DateDebutCertif</div>';
echo '<div class="caseListe labelListe">DateFinCertif</div>';
echo '<div class="caseListe labelListe">Active</div>';
echo '<div class="caseListe labelListe">IdCentre</div>';
echo '<div class="caseListe labelListe">IdFormation</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getNumOffre().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateDebut().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getNbrDHeure().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getNbrStagiaire().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getTypeMarche().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getTauxHoraire().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateDebutCertif().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateFinCertif().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getActive().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getIdCentre().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getIdFormation().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Actions&mode=Afficher&id='.$unObjet->getIdAction().'"><i class="fas fa-file-contract"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Actions&mode=Modifier&id='.$unObjet->getIdAction().'"><i class="fas fa-pen"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Actions&mode=Supprimer&id='.$unObjet->getIdAction().'"><i class="fas fa-trash-alt"></i></a></div>';
}
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-14">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';