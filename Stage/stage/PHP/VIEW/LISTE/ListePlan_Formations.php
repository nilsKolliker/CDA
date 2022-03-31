<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_FormationsManager::getList();
//Création du template de la grid
echo '<div class="grid-col-7 gridListe">';

echo '<div class="bigEspace grid-columns-span-7"></div>';
echo '<div class="caseListe titreListe grid-columns-span-7">Liste des Formations </div>';
echo '<div class="bigEspace grid-columns-span-7"></div>';
echo '<div class="bigEspace grid-columns-span-7"></div>';
$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Formations&mode=Ajouter"><button><i class="fas fa-plus"></i></button></a>':"";
echo '<div class="caseListe grid-columns-span-7">
<div></div>
<div class="caseListe">'.$temp.'</div>
<div></div>
</div>';
echo '<div class="bigEspace grid-columns-span-7"></div>';

echo '<div class="caseListe labelListe">Libelle Court</div>';
echo '<div class="caseListe labelListe">Libelle Long</div>';
echo '<div class="caseListe labelListe">GRN</div>';
echo '<div class="caseListe labelListe">Référent</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getLibelleCourt().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getLibelleLong().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getGRN().'</div>';
echo '<div class="caseListe donneeListe">'.Plan_UtilisateursManager::findById($unObjet->getIdUtilisateur())->getEmail().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Formations&mode=Afficher&id='.$unObjet->getIdFormation().'"><button><i class="fas fa-file-contract"></i></button></a></div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3? '<a href="index.php?page=FormPlan_Formations&mode=Modifier&id='.$unObjet->getIdFormation().'"><button><i class="fas fa-pen"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3? '<a href="index.php?page=FormPlan_Formations&mode=Supprimer&id='.$unObjet->getIdFormation().'"><button><i class="fas fa-trash-alt"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';
}
echo '<div class="bigEspace grid-columns-span-7"></div>';
echo '<div class="bigEspace grid-columns-span-7"></div>';
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