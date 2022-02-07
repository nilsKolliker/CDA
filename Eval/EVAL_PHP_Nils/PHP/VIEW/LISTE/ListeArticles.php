<?php

 echo '<main>';

 echo '<div class="flex-0-1"></div>';

 echo '<div>';
 

$objets = ArticlesManager::getList();
//Création du template de la grid
echo '<div class="grid-col-8 gridListe">';

echo '<div class="caseListe grid-columns-span-8">Liste des Articles </div>';
echo '<div class="caseListe grid-columns-span-8">
<div></div>
<div class="caseListe"><a href="index.php?page=FormArticles&mode=Ajouter"><i class="fas fa-plus"></i></a></div>
<div></div>
</div>';

echo '<div class="caseListe"></div>';
echo '<div class="caseListe entete">LibelleArticle</div>';
echo '<div class="caseListe entete">DescriptionArticle</div>';
echo '<div class="caseListe entete">PrixArticle</div>';
echo '<div class="caseListe entete">IdTypeArticle</div>';

//Remplissage de div vide pour la structure de la grid
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';
echo '<div class="caseListe"></div>';

// Affichage des ennregistrements de la base de données
foreach($objets as $unObjet)
{
	echo '<img class="caseListe" src="IMG/'.$unObjet->getPhotos().'" alt="l\'image de'.$unObjet->getLibelleArticle().'" >';
echo '<div class="caseListe">'.$unObjet->getLibelleArticle().'</div>';
echo '<div class="caseListe">'.$unObjet->getDescriptionArticle().'</div>';
echo '<div class="caseListe">'.$unObjet->getPrixArticle().'</div>';
echo '<div class="caseListe">'.$unObjet->getIdTypeArticle().'</div>';
echo '<div class="caseListe"> <a href="index.php?page=FormArticles&mode=Afficher&id='.$unObjet->getIdArticle().'"><i class="fas fa-file-contract"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormArticles&mode=Modifier&id='.$unObjet->getIdArticle().'"><i class="fas fa-pen"></i></a></div>';
                                                    
echo '<div class="caseListe"> <a href="index.php?page=FormArticles&mode=Supprimer&id='.$unObjet->getIdArticle().'"><i class="fas fa-trash-alt"></i></a></div>';
}
//Derniere ligne du tableau (bouton retour)
echo '<div class="caseListe grid-columns-span-8">
	<div></div>
	<a href="index.php?page=Accueil"><button><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>
	<div></div>
</div>';

echo'</div>'; //Grid
echo'</div>'; //Div
echo '<div class="flex-0-1"></div>';
echo '</main>';