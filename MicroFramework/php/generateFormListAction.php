<?php

/*********************************************************************************************************/
/**********************************  GENERATION DE LISTES ***********************************************/
/*********************************************************************************************************/

function genereListe($chemin,$nomProjet,$nomTable,$colonne,$tabClasseGrid)
{    
$nomTable = ucfirst($nomTable);
$nomFichier = $chemin.$nomProjet.'/PHP/VIEW/LISTE/Liste'.$nomTable.'.php';
$fp=fopen($nomFichier,"w");
$classe = "";

$listeContent = "<?php\n
 echo '<main>';\n
 echo '<div class=\"flex-0-1\"></div>';\n
 echo '<div>';
 \n\n";

$nbChamp = count($colonne);

$listeContent .= "\$objets = ".$nomTable."Manager::getList();\n".

                "//Création du template de la grid\n".
                "echo '<div class=\"grid-col-".($nbChamp-1+3)." gridListe\">';\n";
                if(!in_array("grid-col-".($nbChamp-1+3), $tabClasseGrid))
                {
                    createCSSGrid(($nbChamp-1+3),$chemin, $nomProjet);
                    $classe .= "grid-col-".($nbChamp-1+3);
                }

$listeContent .= "\necho '<div class=\"caseListe titreListe grid-columns-span-".($nbChamp-1+3)."\">Liste des ".$nomTable." </div>';"
                ."\necho '<div class=\"caseListe grid-columns-span-".($nbChamp-1+3)."\">"
                ."\n<div></div>"
                ."\n<div class=\"caseListe\"><a href=\"index.php?page=Form".$nomTable."&mode=Ajouter\"><i class=\"fas fa-plus\"></i></a></div>"
                ."\n<div></div>"
                ."\n</div>';\n";

                for($i=1;$i<$nbChamp;$i++){
                    $listeContent .= "\necho '<div class=\"caseListe labelListe\">".ucfirst($colonne[$i]["nomColonne"])."</div>';";
                }

                $listeContent .= "\n\n//Remplissage de div vide pour la structure de la grid";

                for($i=$nbChamp;$i<($nbChamp+3);$i++){
                    $listeContent .= "\necho '<div class=\"caseListe\"></div>';";
                }

                $listeContent .= "\n\n// Affichage des ennregistrements de la base de données"
                                ."\nforeach(\$objets as \$unObjet)"
                                ."\n{";

                                    for($i=1;$i<count($colonne);$i++)
                                    {
                                        $methode = "get" . ucfirst($colonne[$i]["nomColonne"]);
                                        $listeContent .= "\necho '<div class=\"caseListe donneeListe\">'.\$unObjet->".$methode."().'</div>';";
                                    }
                                    $methode = "get". ucfirst($colonne[0]["nomColonne"]);
                                    $listeContent .= "\necho '<div class=\"caseListe\"> <a href=\"index.php?page=Form".$nomTable."&mode=Afficher&id='.\$unObjet->".$methode."().'\"><i class=\"fas fa-file-contract\"></i></a></div>';
                                                    \necho '<div class=\"caseListe\"> <a href=\"index.php?page=Form".$nomTable."&mode=Modifier&id='.\$unObjet->".$methode."().'\"><i class=\"fas fa-pen\"></i></a></div>';
                                                    \necho '<div class=\"caseListe\"> <a href=\"index.php?page=Form".$nomTable."&mode=Supprimer&id='.\$unObjet->".$methode."().'\"><i class=\"fas fa-trash-alt\"></i></a></div>';"
                                ."\n}";
                
                $listeContent .= "\n//Derniere ligne du tableau (bouton retour)"
                                 ."\necho '<div class=\"caseListe grid-columns-span-".($nbChamp-1+3)."\">"
                                 ."\n\t<div></div>"
                                 ."\n\t<a href=\"index.php?page=Accueil\"><button><i class=\"fas fa-sign-out-alt fa-rotate-180\"></i></button></a>"
                                 ."\n\t<div></div>"
                                 ."\n</div>';"
                                 ."\n\necho'</div>'; //Grid"
                                 ."\necho'</div>'; //Div"
                                 ."\necho '<div class=\"flex-0-1\"></div>';"
                                 ."\necho '</main>';";

                                 fputs($fp,$listeContent); 
                                 fclose($fp);

               
                        return $classe;
}


function createCSSGrid($nbChamp,$chemin, $nomProjet)
{

$template = "grid-template-columns :";
for ($i=0; $i < $nbChamp-3; $i++) { 
    $template .= " 2fr"; 
}
$template .= " 0.5fr 0.5fr 0.5fr;";

    $css = "\n\n.grid-col-".$nbChamp. " {"
        ."\n\tdisplay : grid;"
        ."\n\tborder : 0.5px solid #ff0080;"
        ."\n\t".$template
        ."}";

        $css .= "\n\n.grid-columns-span-".($nbChamp). " { "
            ."\n\tgrid-column:1/".($nbChamp+1).";"
            ."\n}";


    file_put_contents($chemin . $nomProjet . '/CSS/' . 'grids.css', $css, FILE_APPEND);
}

function endCSSGrid($chemin, $nomProjet)
{
    $cssGridListe = 
    "\n\n.gridListe div,button,a {"
    ."\n\tjustify-content: center;"
    ."\n\talign-items: center;"
    ."\n}"
    
    ."\n\n.caseListe {"
    ."\n\tborder: 1px solid #ff0080;"
    ."\n\tpadding : 0.2em;"
    ."\n}"

    ."\n\n.caseForm {"
        ."\n\tborder: 1px solid #00aaff;"
        ."\n\tpadding : 0.2em;"
        ."\n}"


    ."\n\n.GridForm {"
    ."\n\t display : grid;"
    ."\n\tgrid-template-columns: 2fr 2fr 0.5fr 0.5fr;"
    ."\n\tgrid-gap: 0.5em;"
    ."\n}"
    
    ."\n\n.GridForm div,button,a {"
    ."\n\tjustify-content: center;"
    ."\n\talign-items: center;"
    ."\n}"

    ."\n\n.flex-0-1 {"
    ."\n\tflex:0.1;"
    ."\n}"

    ."\n\n.gridForm-col-span {"
    ."\n\tgrid-column: 1/5 ;"
    ."\n}";

    file_put_contents($chemin . $nomProjet . '/CSS/' . 'grids.css',$cssGridListe, FILE_APPEND);
}



/*********************************************************************************************************/
/**********************************  GENERATION DE FORMS ***********************************************/
/*********************************************************************************************************/

function generateForm($chemin,$nomProjet,$nomTable,$colonne){

    $nom=ucfirst($nomTable);
    $nomFichier = $chemin.$nomProjet.'/PHP/VIEW/FORM/Form'.$nom.'.php';
    $fp=fopen($nomFichier,"w");
    $methode = "get".ucfirst($colonne[0]["nomColonne"])."()";
    $formContent = "<?php". 
                    "\n".'global $regex;'.      
                    "\n".'$mode = $_GET[\'mode\'];'.
                    "\n".'$disabled = " ";'.
                    "\n".'switch ($mode) {'.
                    "\n\t".'case "Afficher":'.
                    "\n\t".'case "Supprimer":'.
                    "\n\t\t".'$disabled = " disabled ";'.
                    "\n\t\t".'break;'.
                    "\n".'}'.
                    "\n".''.
                    "\n".'if (isset($_GET[\'id\'])) {'.
                    "\n\t".'$elm = '.$nomTable.'Manager::findById($_GET[\'id\']);'.
                    "\n".'} else {'.
                    "\n\t".'$elm = new '.$nomTable.'();'.
                    "\n".'}'.
                    
                    "\necho '<main class=\"center\">';".
                    "\n".
                    "\necho '<form class=\"GridForm\" action=\"index.php?page=Action".$nom."&mode='.\$_GET['mode'].'\" method=\"post\"/>';".
                    "\n".
                    "\necho '<div class=\"caseForm titreForm col-span-form\">Formulaire ".$nomTable."</div>';".

                    // "\n".'if ($mode != "Ajouter") {'.
                    "\n\t"."echo '<div class=\"noDisplay\"><input type=\"hidden\" value=\"'.\$elm->".$methode.".'\" name=".ucfirst($colonne[0]["nomColonne"])."></div>';";
                    // "\n".'};';

                    for ($i=1; $i <count($colonne); $i++) {
                        $att = ucfirst($colonne[$i]["nomColonne"]);
                        $methode = "get".ucfirst($att)."()";
                        $formContent .= "\necho '<label for=$att class=\"caseForm labelForm\">'.texte(\"".$att."\").'</label>';".
                                        "\necho '<div class=\"caseForm donneeForm\"><input type=\"text\" '.\$disabled .'value=\"'.\$elm->".$methode.".'\" name=$att pattern=\"'.\$regex[\"*\"].'\"></div>';".
                                        "\necho '<div class=\"caseForm infoForm\"><i class=\"fas fa-question-circle\"></i></div>';".
                                        "\necho '<div class=\"caseForm checkForm\"><i class=\"fas fa-check-circle\"></i></div>';".
                                        "\n";
                    }

    $formContent .= "\necho '<div class=\"caseForm col-span-form\">".
                    "\n\t<div></div>".
                    "\n\t<div><a href=\"index.php?page=Liste".$nom."\"><button type=\"button\"><i class=\"fas fa-sign-out-alt fa-rotate-180\"></i></button></a></div>".
                    "\n\t<div class=\"flex-0-1\"></div>';".
                    "\n\techo (\$mode == \"Afficher\") ? \"\" : \" <div><button type=\\\"submit\\\"><i class=\\\"fas fa-paper-plane\\\"></i></button></div>\";".
                    "\n\techo'<div></div>".
                    "\n\t</div>';".
                    "\n".
                    "\necho'</form>';".
                    "\n".
                    "\necho '</main>';";

    fputs($fp,$formContent); 
    fclose($fp);

}

/*********************************************************************************************************/
/**********************************  GENERATION DE ACTIONS ***********************************************/
/*********************************************************************************************************/

/**
 * Méthode qui crée le contenue du fichier action
 * Prend en paramètre le nom de la classe, le nom du fichier
 * 
 * @param String  $nom
 * @param Resousce $fichier
 * @return Void
 */
function genereAction($chemin,$nomProjet,$nomTable)
{
    $nom=ucfirst($nomTable);
    $nomFichier = $chemin.$nomProjet.'/PHP/CONTROLLER/ACTION/Action'.$nom.'.php';
    $fp=fopen($nomFichier,"w");
    $actionContent='<?php'.
                    "\n".'$elm = new '.$nom.'($_POST);'.
                    "\n".
                    "\n".'switch ($_GET[\'mode\']) {'.
                    "\n\t".'case "Ajouter": {'.
                    "\n\t\t".'$elm = '.$nom.'Manager::add($elm);'.
                    "\n\t\t".'break;'.
                    "\n\t".'}'.
                    "\n\t".'case "Modifier": {'.
                    "\n\t\t".'$elm = '.$nom.'Manager::update($elm);'.
                    "\n\t\t".'break;'.
                    "\n\t".'}'.
                    "\n\t".'case "Supprimer": {'.
                    "\n\t\t".'$elm = '.$nom.'Manager::delete($elm);'.
                    "\n\t\t".'break;'.
                    "\n\t".'}'.
                    "\n".'}'.
                    "\n".''.
                    "\n".'header("location:index.php?page=Liste'.$nom.'");';
    fputs($fp,$actionContent); 
    fclose($fp);
}