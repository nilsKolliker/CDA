<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = Plan_ActionsManager::getList();
//Création du template de la grid
$listeCentre= Plan_CentresManager::getList();
foreach ($listeCentre as $centre) {
	$listeCentreById[$centre->getIdCentre()]=$centre;
}
$listeTypeMarche= Plan_TypeMarchesManager::getList();
foreach ($listeTypeMarche as $typeMarche) {
	$listeTypeMarcheById[$typeMarche->getIdTypeMarche()]=$typeMarche;
}
$listeFormation= Plan_FormationsManager::getList();
foreach ($listeFormation as $formation) {
	$listeFormationById[$formation->getIdFormation()]=$formation;
}
echo '<div class="grid-col-14 gridListe">';

echo '<div class="bigEspace grid-columns-span-14"></div>';
echo '<div class="caseListe titreListe grid-columns-span-14">Liste des Plan_Actions </div>';
echo '<div class="bigEspace grid-columns-span-14"></div>';
echo '<div class="bigEspace grid-columns-span-14"></div>';
$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Actions&mode=Ajouter"><button><i class="fas fa-plus"></i></button></a>':"";
echo '<div class="caseListe grid-columns-span-14">
<div></div>
<div class="caseListe">'.$temp.'</div>
<div></div>
</div>';
echo '<div class="bigEspace grid-columns-span-14"></div>';

echo '<div class="caseListe labelListe">NumOffre</div>';
echo '<div class="caseListe labelListe">DateDebut</div>';
echo '<div class="caseListe labelListe">NbrDHeure</div>';
echo '<div class="caseListe labelListe">NbrStagiaire</div>';
echo '<div class="caseListe labelListe">idTypeMarche</div>';
echo '<div class="caseListe labelListe">TauxHoraire</div>';
echo '<div class="caseListe labelListe">DateDebutCertif</div>';
echo '<div class="caseListe labelListe">DateFinCertif</div>';
echo '<div class="caseListe labelListe">Active</div>';
echo '<div class="caseListe labelListe">Centre</div>';
echo '<div class="caseListe labelListe">Formation</div>';

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
echo '<div class="caseListe donneeListe">'.$listeTypeMarcheById[$unObjet->getIdTypeMarche()]->getLibelle().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getTauxHoraire().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateDebutCertif().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getDateFinCertif().'</div>';
echo '<div class="caseListe donneeListe">'.$unObjet->getActive().'</div>';
echo '<div class="caseListe donneeListe">'.$listeCentreById[$unObjet->getIdCentre()]->getLibelle().'</div>';
echo '<div class="caseListe donneeListe">'.$listeFormationById[$unObjet->getIdFormation()]->getLibelleCourt().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormPlan_Actions&mode=Afficher&id='.$unObjet->getIdAction().'"><button><i class="fas fa-file-contract"></i></button></a></div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3? '<a href="index.php?page=FormPlan_Actions&mode=Modifier&id='.$unObjet->getIdAction().'"><button><i class="fas fa-pen"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';

$temp=$_SESSION["utilisateur"]->getRole()>=3?'<a href="index.php?page=FormPlan_Actions&mode=Supprimer&id='.$unObjet->getIdAction().'"><button><i class="fas fa-trash-alt"></i></button></a>':"";
echo '<div class="caseListe">'.$temp.'</div>';
}
echo '<div class="bigEspace grid-columns-span-14"></div>';
echo '<div class="bigEspace grid-columns-span-14"></div>';
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