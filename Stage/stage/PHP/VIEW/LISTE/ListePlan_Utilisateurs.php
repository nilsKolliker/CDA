<?php
 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_UtilisateursManager::getList();
//on vas faire qu'une fois les requetes pour connaitre les centres ils sont moins nombreux que les employers
$listeCentre= Plan_CentresManager::getList();
foreach ($listeCentre as $centre) {
	$listeCentreById[$centre->getIdCentre()]=$centre;
}
//Création du template de la grid
echo '<div class="grid-col-9 gridListe">';

echo '<div class="bigEspace grid-columns-span-9"></div>';
echo '<div class="caseListe titreListe grid-columns-span-9">Liste des Utilisateurs </div>';
echo '<div class="bigEspace grid-columns-span-9"></div>';
echo '<div class="bigEspace grid-columns-span-9"></div>';
$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Utilisateurs&mode=Ajouter"><button><i class="fas fa-plus"></i></button></a>':"";
echo '<div class="caseListe grid-columns-span-9">
<div></div>
<div class="caseListe">'.$temp.'</div>
<div></div>
</div>';
echo '<div class="bigEspace grid-columns-span-9"></div>';

echo '<div class="caseListe labelListe">Matricule</div>';
echo '<div class="caseListe labelListe">Nom</div>';
echo '<div class="caseListe labelListe">Prenom</div>';
echo '<div class="caseListe labelListe">Email</div>';
echo '<div class="caseListe labelListe">Role</div>';
echo '<div class="caseListe labelListe">Centre</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
echo '<div class="caseListe donneeListe">'.$unObjet->getMatricule().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getNom().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getPrenom().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getEmail().'</div>';
echo '<div class="caseListe donneeListe">'.ROLES[$unObjet->getRole()].'</div>';
echo '<div class="caseListe donneeListe">'.$listeCentreById[$unObjet->getIdCentre()]->getLibelle().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Utilisateurs&mode=Afficher&id='.$unObjet->getIdUtilisateur().'"><button><i class="fas fa-file-contract"></i></button></a></div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Utilisateurs&mode=Modifier&id='.$unObjet->getIdUtilisateur().'"><button><i class="fas fa-pen"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Utilisateurs&mode=Supprimer&id='.$unObjet->getIdUtilisateur().'"><button><i class="fas fa-trash-alt"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';
}
echo '<div class="bigEspace grid-columns-span-9"></div>';
echo '<div class="bigEspace grid-columns-span-9"></div>';
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-9">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';