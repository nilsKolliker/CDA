<?php

/**************   IMPORT DES FICHIERS NECESSAIRES **************/
require('creationStructure.php');
require('connexionDb.php');
require('generateFormListAction.php');
/***********************     INFOS     *******************************/ 
$file = json_decode(file_get_contents("tables.json",true));

if (substr($argv[1],-1) != '\\')
{
    $chemin = $argv[1].'/';
} else {
    $chemin = $argv[1];
}

$nomProjet = $argv[3];

$repository = $chemin.$argv[3];

$nomDb = $argv[2];

$tabClasseGrid = []; // pour les grids 

/***********************     CONNEXION     *******************************/
$jeton = connectDb($nomDb);

/*****************************    RECUPERATION DE LA BDD    ******************************/
$tables = recupTable($jeton,$nomDb);

array_splice($tables,array_search(strtolower("textes"), array_map('strtolower', $tables)),1);//on retire la table texte
/*    =====   Creation de la structure   =====   */


creationStructure($chemin, $nomProjet, $nomDb, $repository, $tables);


for($i=0;$i<count($tables);$i++)
{
    $baseDeDonnees[$tables[$i]] = recupColonne($jeton,$nomDb,$tables[$i]); // Tableau associatif comprenant pour les clés le nom des tables etpour les valeurs les colonnes de chaques tables
}



foreach ($baseDeDonnees as $nomTable => $colonnes)
{
    /******************************   CREATION DES FICHIERS .CLASS.PHP   ******************************/
    genereClasse($chemin,$nomProjet,$nomTable, $colonnes);
    /******************************   CREATION DES FICHIERS MANAGER.PHP   ******************************/
    genereManager($chemin,$nomProjet,$nomTable, $colonnes);
    /******************************   CREATION DES FICHIERS LISTES/FORMS/ACTIONS.PHP   ******************************/
    $tabClasseGrid[] = genereListe($chemin,$nomProjet,$nomTable,$colonnes,$tabClasseGrid);
    generateForm($chemin,$nomProjet,$nomTable,$colonnes);
    genereAction($chemin,$nomProjet,$nomTable); 
}
endCSSGrid($chemin,$nomProjet);
unlink("./php/tables.json");

