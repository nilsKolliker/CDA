<?php

/**
 * Méthode qui crée l'entête de la classe
 * Prend en paramètre le nom de la classe, le nom de la classe mere le fichier
 * et un booleen indiquant si il y a un heritage 
 * dans lequel on crée la classe
 * 
 * @param String  $nom
 * @param Resousce $fichier
 * @return Void
 */
function genereEnt($nom,$fichier)
{
    $nom.="Manager";
    $entete='<?php'."\n\nclass $nom ";
    $entete.="\n{\n";
    fputs($fichier,$entete); 
}

function genereAdd($fichier,$nom)
{
    $cons= "\n\t".'public static function add('.$nom.' $obj)'."\n".
           "\t{\n ".
            "\t\t". 'return DAO::add($obj);' ."\n".
            "\t}\n";
    fputs($fichier,$cons);
}


function genereUpdate($fichier,$nom)
{               
     $cons= "\n\t".'public static function update('.$nom.' $obj)'."\n".
            "\t{\n ".
                "\t\t". 'return DAO::update($obj);' ."\n".
            "\t}\n";
        fputs($fichier,$cons);
}

function genereDelete($fichier,$nom)
{                    
    $cons= "\n\t".'public static function delete('.$nom.' $obj)'."\n".
            "\t{\n ".
                "\t\t". 'return DAO::delete($obj);' ."\n".
            "\t}\n";
            fputs($fichier,$cons);
}

function genereFindById($fichier, $nom, $tabAtt)
{
    $cons= "\n\t".'public static function findById($id)'."\n".
    "\t{\n ".
        "\t\t". 'return DAO::select('.$nom.'::getAttributes(),"'.$nom.'",["'.$tabAtt[0]["nomColonne"].'" => $id])[0];' ."\n".
    "\t".'}'."\n";
    fputs($fichier,$cons);
}

function genereGetList($fichier, $nom)
{
    $cons= "\n\t".'public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)'."\n".
    "\t{\n ".
        "\t\t". '$nomColonnes = ($nomColonnes==null)?'.$nom.'::getAttributes():$nomColonnes;' ."\n".
        "\t\t". 'return DAO::select($nomColonnes,"'.$nom.'",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );'.
    "\t".'}'."\n";
    fputs($fichier,$cons);
}

// Genere le nom et ouvre le fichier contenant la classe

function genereManager($chemin,$nomProjet,$nomTable,$tabAtt)
{
    if($nomTable!="textes"){
        $nomFichier = $chemin.$nomProjet.'/PHP/MODEL/MANAGER/'.strtoupper($nomTable[0]).substr($nomTable,1)."Manager.Class.php";
        $nomObj=strtoupper($nomTable[0]).substr($nomTable,1);
        $fp=fopen($nomFichier,"w");

        genereEnt($nomObj,$fp);
        genereAdd($fp,$nomObj);
        genereUpdate($fp,$nomObj);
        genereDelete($fp,$nomObj);
        genereFindById($fp,$nomObj,$tabAtt);
        genereGetList($fp,$nomObj);
        fputs($fp,'}');
        fclose($fp);
    }
    
}



?>