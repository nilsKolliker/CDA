<?php
define("SQL_TO_PHP",["TINYINT"=>"int",// tableau pour convertir les types sql en type php
                     "SMALLINT"=>"int",
                     "MEDIUMINT"=>"int",
                     "INT"=>"int",
                     "BIGINT"=>"int",
                     "DECIMAL"=>"float",
                     "FLOAT"=>"float",
                     "DOUBLE"=>"float",
                     "REAL"=>"float",
                     "BIT"=>"int",
                     "BOOLEAN"=>"bool",
                     "SERIAL"=>"int",
                     "CHAR"=>"string",
                     "VARCHAR"=>"string",
                     "TINYTEXT"=>"string",
                     "TEXT"=>"string",
                     "MEDIUMTEXT"=>"string",
                     "LONGTEXT"=>"string",
                     "DATE"=>"DateTime",
                     "DATETIME"=>"DateTime",
                     "TIMESTAMP"=>"DateTime",
                     "TIME"=>"DateInterval",
                     "YEAR"=>"int"]);

/*********************************************************************************************************/
/**********************************  GENERATION DE CLASSE  ***********************************************/
/******************************************************************************************************* */


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
function genereEntete($nom,$fichier)
{
    $nom=ucfirst($nom);
    $entete='<?php'."\n\nclass $nom ";
    $entete.="\n{\n\n";
    fputs($fichier,$entete); 
}

/**
 * Méthode qui crée l'affichage des attributs de la classe
 * Prend en paramètre le tableau d'attribut et le fichier 
 * dans lequel on crée la classe
 * 
 * @param Array  $tabAtt
 * @param Resousce $fichier
 * @return void
 * 
 */
function affichageAttributs($tabAtt,$fichier)
{
    $sepAt="\t/*****************Attributs***************** */\n\n";  
    $tab="\t".'private static $_attributes=[';
    for($i=0;$i<count($tabAtt);$i++)
    {
            $sepAt.="\t".'private $_'.$tabAtt[$i]["nomColonne"].";\n";
            $tab.="\"".$tabAtt[$i]["nomColonne"]."\",";
    }
    $tab=substr($tab, 0, strlen($tab) -1);
    $sepAt.=$tab."];";
    fputs($fichier,$sepAt);
}

/**
 * Méthode qui crée l'affichage du constructeur de classe
 * Prend en paramètre le fichier dans lequel on crée la classe
 * 
 * @param Resousce $fichier
 * @return Void
 */
function genereConstruct($fichier)
{
    $cons= "\n\t/*****************Constructeur***************** */\n\n".
           "\t".'public function __construct(array $options = [])'."\n".
           "\t{\n ".
           "\t\tif (!empty(".'$options'.")) // empty : renvoi vrai si le tableau est vide\n".
           "\t\t{\n".
           "\t\t\t".'$this->hydrate($options);'."\n".
           "\t\t}\n".  
           "\t}\n".
           "\t".'public function hydrate($data)'."\n".
           "\t{\n ".
           "\t\t".'foreach ($data as $key => $value)'."\n".
           "\t\t{\n ".
           "\t\t\t".'$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule'."\n". 
           "\t\t\t".'if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe'."\n". 
           "\t\t\t{\n".
           "\t\t\t\t".'$this->$methode($value===""?null:$value);'."\n".
           "\t\t\t}\n".
           "\t\t}\n".
           "\t}\n";

        fputs($fichier,$cons);
}

/**
 * Méthode qui crée l'affichage des Accesseurs de la classe
 * Prend en paramètre le tableau d'attribut et le fichier 
 * dans lequel on crée la classe
 * 
 * @param Array  $tabAtt
 * @param Resousce $fichier
 * @return Void
 */
function genereSetters($tabInfoAtt,$fichier)
{
    $get="\n\t/***************** Accesseurs ***************** */\n\n";
    for($i=0;$i<count($tabInfoAtt);$i++)
    {
        $typeSql=strtoupper(explode("(",$tabInfoAtt[$i]["type"])[0]);
        $type=SQL_TO_PHP[$typeSql];
        [explode("(",$tabInfoAtt[$i]["type"])[0]];

        $nullable=$tabInfoAtt[$i]["null"]||$i==0?"?":"";
        $get.="\n\t".'public function get'.ucfirst($tabInfoAtt[$i]["nomColonne"])."()".
              "\n\t{";
        //les datetime et dateInterval ont des accesseurs plus complexe que les autres
        if ($type=="DateTime") {
            $format=$typeSql=="DATE"?'Y-n-j':'Y-n-j H:i:s';
            $get.="\n\t\treturn ".'is_null($this->_'.$tabInfoAtt[$i]["nomColonne"].')?null:$this->_'.$tabInfoAtt[$i]["nomColonne"]."->format('".$format."');\n";
            $get.="\t}\n".
                  "\n\t".'public function set'.ucfirst($tabInfoAtt[$i]["nomColonne"])."(".$nullable."string"." $".$tabInfoAtt[$i]["nomColonne"].")".
                  "\n\t{";
            $get.=$tabInfoAtt[$i]["null"]?
                  "\n\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"].'=is_null($'.$tabInfoAtt[$i]["nomColonne"].')?null:DateTime::createFromFormat("'.$format.'",$'.$tabInfoAtt[$i]["nomColonne"].');'."\n":
                  "\n\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"].'=DateTime::createFromFormat("'.$format.'",$'.$tabInfoAtt[$i]["nomColonne"].');'."\n";
        }else if ($type=="DateInterval") {
            $get.="\n\t\treturn ".'is_null($this->_'.$tabInfoAtt[$i]["nomColonne"].')?null:$this->_'.$tabInfoAtt[$i]["nomColonne"]."->format('%h:%i:%s');\n";
            $get.="\t}\n".
                  "\n\t".'public function set'.ucfirst($tabInfoAtt[$i]["nomColonne"])."(".$nullable."string"." $".$tabInfoAtt[$i]["nomColonne"].")".
                  "\n\t{\n";
            $get.=$tabInfoAtt[$i]["null"]?
                  "\n\t\t".'if(is_null($'.$tabInfoAtt[$i]["nomColonne"]."))".
                  "\n\t\t"."{".
                  "\n\t\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"].'=null;'.
                  "\n\t\t"."}".
                  "\n\t\t"."else".
                  "\n\t\t"."{".
                  "\n\t\t\t".'list($hours, $minutes, $seconds) = sscanf($'.$tabInfoAtt[$i]["nomColonne"].", '%d:%d:%d');".
                  "\n\t\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"]."=new DateInterval(sprintf('PT%dH%dM%dS', \$hours, \$minutes, \$seconds));".
                  "\n\t\t"."}":
                  "\n\t\t".'list($hours, $minutes, $seconds) = sscanf($'.$tabInfoAtt[$i]["nomColonne"].", '%d:%d:%d');".
                  "\n\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"]."=new DateInterval(sprintf('PT%dH%dM%dS', \$hours, \$minutes, \$seconds));".
                  "\n";
        }else {
            $get.="\n\t\treturn ".'$this->_'.$tabInfoAtt[$i]["nomColonne"].";\n".
                  "\t}\n".
                  "\n\t".'public function set'.ucfirst($tabInfoAtt[$i]["nomColonne"])."(".$nullable.$type." $".$tabInfoAtt[$i]["nomColonne"].")".
                  "\n\t{".
                  "\n\t\t".'$this->_'.$tabInfoAtt[$i]["nomColonne"].'=$'.$tabInfoAtt[$i]["nomColonne"].';'."\n";
        }
        $get.="\t}\n";
    }
    $get.="\n\t".'public static function getAttributes()'.
            "\n\t{".
            "\n\t\treturn "."self::\$_attributes;\n".  
            "\t}\n";
    fputs($fichier,$get);
}

/**
 * Méthode qui crée l'affichage de la méthode toString() de la classe
 * Prend en paramètre le tableau d'attribut et le fichier 
 * dans lequel on crée la classe
 * 
 * @param Array  $tabAtt
 * @param Resousce $fichier
 * @return Void
 */
function genereToString($tabAt,$fichier)
{
    $rep="";
    for ($i=0;$i<count($tabAt);$i++)
    {
        $rep.='"'.ucfirst($tabAt[$i]["nomColonne"]).' : ".$this->get'.ucfirst($tabAt[$i]["nomColonne"]).'().';
    }
    $rep.='"\n"';
    $toStr="\n\t/*****************Autres Méthodes***************** */\n\n".
            "\t/**\n".
            "\t* Transforme l'objet en chaine de caractères\n".
            "\t*\n".
            "\t* @return String\n".
            "\t*/\n".
            "\tpublic function toString()\n".
            "\t{\n".
            "\t\treturn ".$rep.";\n".
            "\t}\n";
    fputs($fichier,$toStr);
}


/*********************************************************************************************************/
/**********************************  GENERATION DE ACTIONS ***********************************************/
/*********************************************************************************************************/

// /**
//  * Méthode qui crée le contenue du fichier action
//  * Prend en paramètre le nom de la classe, le nom du fichier
//  * 
//  * @param String  $nom
//  * @param Resousce $fichier
//  * @return Void
//  */
// function genereAction($chemin,$nomProjet,$nomTable)
// {
//     $nom=ucfirst($nomTable);
//     $nomFichier = $chemin.$nomProjet.'/PHP/CONTROLLER/ACTION/'.$nom.'Action.php';
//     $fp=fopen($nomFichier,"w");
//     $actionContent='<?php'.
//                     "\n".'$elm = new '.$nom.'($_POST);'.
//                     "\n".
//                     "\n".'switch ($_GET[\'mode\']) {'.
//                     "\n\t".'case "Ajouter": {'.
//                     "\n\t\t".'$elm = '.$nom.'Manager::add($elm);'.
//                     "\n\t\t".'break;'.
//                     "\n\t".'}'.
//                     "\n\t".'case "Modifier": {'.
//                     "\n\t\t".'$elm = '.$nom.'Manager::update($elm);'.
//                     "\n\t\t".'break;'.
//                     "\n\t".'}'.
//                     "\n\t".'case "Supprimer": {'.
//                     "\n\t\t".'$elm = '.$nom.'Manager::delete($elm);'.
//                     "\n\t\t".'break;'.
//                     "\n\t".'}'.
//                     "\n".'}'.
//                     "\n".''.
//                     "\n".'header("location:index.php?page=liste'.$nom.'");';
//     fputs($fp,$actionContent); 
//     fclose($fp);
// }

/********************************* FIN DES FONCTIONS********************************************** */





function genereClasse($chemin,$nomProjet,$nomTable,$infoColonne)
{
    // Genere le nom et ouvre le fichier contenant la classe
    $nomFichier = $chemin.$nomProjet.'/PHP/CONTROLLER/CLASSE/'.strtoupper($nomTable[0]).substr($nomTable,1).'.Class.php';
    $fp=fopen($nomFichier,"w");

    // Affichage de l'entête du fichier
    genereEntete($nomTable,$fp);
    // Affichage des attributs
    affichageAttributs($infoColonne,$fp);//infoColonne contient à la fois le nom de la colonne et son type (sql)
    // Affichage des getters setters
    genereSetters($infoColonne,$fp);
    // Affichage du constructeur
    genereConstruct($fp);
    // Affichage la fonction toString
    genereToString($infoColonne,$fp);
    //Parenthèse de la fin de classe
    fputs($fp,'}');
    //Fermeture du fichier contenant la classe
    fclose($fp);
}


?>