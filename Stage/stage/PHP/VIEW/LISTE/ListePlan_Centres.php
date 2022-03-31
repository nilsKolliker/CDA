<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_CentresManager::getList();
//Création du template de la grid
echo '<div class="grid-col-4 gridListe">';

echo '<div class="bigEspace grid-columns-span-4"></div>';
echo '<div class="caseListe titreListe grid-columns-span-4">Liste des Centres </div>';
echo '<div class="bigEspace grid-columns-span-4"></div>';
echo '<div class="bigEspace grid-columns-span-4"></div>';
$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Centres&mode=Ajouter"><button><i class="fas fa-plus"></i></button></a>':"";
echo '<div class="caseListe grid-columns-span-4">
<div></div>
<div class="caseListe">'.$temp.'</div>
<div></div>
</div>';
echo '<div class="bigEspace grid-columns-span-4"></div>';

echo '<div class="caseListe labelListe">Libelle</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getLibelle().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Centres&mode=Afficher&id='.$unObjet->getIdCentre().'"><button><i class="fas fa-file-contract"></i></button></a></div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Centres&mode=Modifier&id='.$unObjet->getIdCentre().'"><button><i class="fas fa-pen"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Centres&mode=Supprimer&id='.$unObjet->getIdCentre().'"><button><i class="fas fa-trash-alt"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';
}
echo '<div class="bigEspace grid-columns-span-4"></div>';
echo '<div class="bigEspace grid-columns-span-4"></div>';
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