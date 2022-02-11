<?php

include "generate.php";
include "generateManager.php";


/*********************************************************************************************************/
/*****                              CONNECTION A LA BASE DE DONNEES                                 ******/
/*********************************************************************************************************/

/**
 * 
 *   Etablie La connection avec la base de données
 * 
 * @param string Nom de la base de données
 * 
 * @return object PDO  pointant sur la base de données
 * 
 */
function connectDb($nomDB)
{
    global $file;
    try { // execute les instructions et rpère les erreurs
       // var_dump('mysql:host='.$file->Server.';port='.$file->Port.';dbname='.$nomDB.';charset=utf8');
        $db = new PDO('mysql:host='.$file->Server.';port='.$file->Port.';dbname='.$nomDB.';charset=utf8', $file->Username, $file->Password);
    }
    catch (Exception $e) // si une erreur est levée, on agit en conséquence
    {
        if ($e->getCode() == 1049)
        {
            echo "Base de données indisponible\n";
            die(); // permet d'arrêter l'execution
        }
        else if ($e->getCode() == 1045) // erreur identification
        {
            echo "La connexion a échouée\n";
            die();
        }
        else
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    echo "Connexion à la base de données réussie\n";
    return $db;
}


/*********************** Récupération des noms de colonnes de la table ****************************/

/**
 * 
 * Récupère le nom des colonnes d'une table passée en paramètre
 * 
 * @param object PDO  pointant sur la base de données
 * @param string Nom de la base de données
 * @param string Nom de la table
 * 
 * @return array Tableau contenant les noms des colonnes
 * 
 */

function recupColonne($db,$nomDB,$nomTable)
{
    $requete = $db->query('SHOW COLUMNS FROM '.$nomTable.' FROM '.$nomDB); // $requete est un objet de type PDO_Statement
    while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) // le while permet de boucler sur les enregistrements
    // il s'arrete quand fetch renvoi false
    {
        $colonne[]=["nomColonne"=>$donnees["Field"],"type"=>$donnees["Type"],"null"=>$donnees["Null"]=="YES"];
    }
    return $colonne;
}

function recupTable($db,$nomDB)
{
    global $file;
    $table= explode(";",$file->NomTables);
    return $table;
}