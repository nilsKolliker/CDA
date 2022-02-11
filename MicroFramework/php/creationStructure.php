<?php

function creationStructure($path, $nomProjet, $nomDB, $repository, $tables)
{
    global $file;

    // CREATION DES DIFFERENTS DOSSIERS DU PROJET WEB
    mkdir($path . $nomProjet, 0777, true);
    mkdir($path . $nomProjet . '/IMG', 0777, true);
    mkdir($path . $nomProjet . '/DOCS', 0777, true);
    mkdir($path . $nomProjet . '/HTML', 0777, true);
    mkdir($path . $nomProjet . '/CSS', 0777, true);
    mkdir($path . $nomProjet . '/JS', 0777, true);
    mkdir($path . $nomProjet . '/PHP', 0777, true);
    mkdir($path . $nomProjet . '/SQL', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/MODEL', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/MODEL' . '/MANAGER', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/MODEL' . '/API', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/VIEW', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/VIEW' . '/FORM', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/VIEW' . '/GENERAL', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/VIEW' . '/LISTE', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/CONTROLLER', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/CONTROLLER' . '/ACTION', 0777, true);
    mkdir($path . $nomProjet . '/PHP' . '/CONTROLLER' . '/CLASSE', 0777, true);


    // CREATION DES DIFFERENTS FICHIERS DU PROJET WEB
    $HTML_file = fopen($path . $nomProjet . '/HTML/' . 'index.html', "w");
    $CSS_file = fopen($path . $nomProjet . '/CSS/' . 'style.css', "w");
    $JS_file = fopen($path . $nomProjet . '/JS/' . 'script.js', "w");
    $GENERAL_INDEX_file = fopen($path . $nomProjet . '/' . 'index.php', "w");
    $DBCONNECT_MODEL_file = fopen($path . $nomProjet . '/PHP' . '/MODEL/MANAGER/' . 'DbConnect.Class.php', "w");
    $SQL_file = fopen($path . $nomProjet . '/SQL/' . 'Script.sql', "w");
    $VIEW_NAVPHP_file = fopen($path . $nomProjet . '/PHP' . '/VIEW/GENERAL/' . 'Nav.php', "w");
    $ACCUEIL_file = fopen($path . $nomProjet . '/PHP' . '/VIEW/GENERAL/' . 'Accueil.php', "w");
    $PARAMETRES_file = fopen($path . $nomProjet . '/' . 'config.json', "w");
    $TEXTEMANAGER_file = fopen($path . $nomProjet . '/PHP' . '/MODEL/MANAGER/' . 'TextesManager.Class.php', "w");

    // CREATE DE FICHIERS AVEC FONCTION file_put_contents
    file_put_contents($path . $nomProjet . '/CSS/' . 'grids.css', "\n/********** GRIDS **********/");
    file_put_contents($path . $nomProjet . '/CSS/' . 'root.css', file_get_contents("./css/root.css", true));
    file_put_contents($path . $nomProjet . '/CSS/' . 'form.css', file_get_contents("./css/form.css", true));
    file_put_contents($path . $nomProjet . '/PHP/VIEW/GENERAL/' . 'Head.php', file_get_contents("Head.php", true));
    file_put_contents($path . $nomProjet . '/PHP/VIEW/GENERAL/' . 'Header.php', file_get_contents("Header.php", true));
    file_put_contents($path . $nomProjet . '/PHP/VIEW/GENERAL/' . 'Footer.php', file_get_contents("Footer.php", true));
    file_put_contents($path . $nomProjet . '/PHP/CONTROLLER/CLASSE/' . 'Parametres.Class.php', file_get_contents("Parametres.Class.php", true));
    file_put_contents($path . $nomProjet . '/PHP/CONTROLLER/' . 'Outils.php', file_get_contents("Outils.php", true));
    file_put_contents($path . $nomProjet . '/PHP/MODEL/MANAGER/' . 'DAO.Class.php', file_get_contents("DAO.Class.php", true));
    file_put_contents($path . $nomProjet . '/PHP/MODEL/MANAGER/' . 'DbConnect.Class.php', file_get_contents("DbConnect.Class.php", true));
    file_put_contents($path . $nomProjet . '/PHP/VIEW/FORM/' . 'FormInscriptionConnexion.php', file_get_contents("FormInscriptionConnexion.php", true));
    file_put_contents($path . $nomProjet . '/PHP/CONTROLLER/ACTION/' . 'ActionConnexion.php', file_get_contents("ActionConnexion.php", true));
    file_put_contents($path . $nomProjet . '/PHP/CONTROLLER/ACTION/' . 'ActionDeconnexion.php', file_get_contents("ActionDeconnexion.php", true));
    file_put_contents($path . $nomProjet . '/PHP/CONTROLLER/ACTION/' . 'ActionInscription.php', file_get_contents("ActionInscription.php", true));
    file_put_contents($path . $nomProjet . '/PHP/MODEL/API/' . 'ListeMailAPI.php', file_get_contents("ListeMailAPI.php", true));
    file_put_contents($path . $nomProjet . '/JS/' . 'VerifForm.js', file_get_contents("./js/VerifForm.js", true));

    //var_dump(file_get_contents("root.css", true));
    // INSERTION DES FICHIERS DE PROTECTIONS DE NIVEAU 1
    $IMG_security = fopen($path . $nomProjet . '/IMG/' . 'index.php', "w");
    $DOCS_security = fopen($path . $nomProjet . '/DOCS/' . 'index.php', "w");
    $HTML_security = fopen($path . $nomProjet . '/HTML/' . 'index.php', "w");
    $CSS_security = fopen($path . $nomProjet . '/CSS/' . 'index.php', "w");
    $JS_security = fopen($path . $nomProjet . '/JS/' . 'index.php', "w");
    $PHP_security = fopen($path . $nomProjet . '/PHP/' . 'index.php', "w");
    $MODEL_security = fopen($path . $nomProjet . '/PHP' . '/MODEL/' . 'index.php', "w");    
    $API_security = fopen($path . $nomProjet . '/PHP/MODEL/API/' . 'index.php', "w");
    $MANAGER_security = fopen($path . $nomProjet . '/PHP/MODEL/MANAGER/' . 'index.php', "w");
    $VIEW_security = fopen($path . $nomProjet . '/PHP' . '/VIEW/' . 'index.php', "w");
    $FORM_security = fopen($path . $nomProjet . '/PHP' . '/VIEW/FORM/' . 'index.php', "w");
    $GENERAL_security = fopen($path . $nomProjet . '/PHP' . '/VIEW/GENERAL/' . 'index.php', "w");
    $LISTE_security = fopen($path . $nomProjet . '/PHP' . '/VIEW/LISTE/' . 'index.php', "w");
    $CONTROLLER_security = fopen($path . $nomProjet . '/PHP' . '/CONTROLLER/' . 'index.php', "w"); 
    $CLASSE_security = fopen($path . $nomProjet . '/PHP/CONTROLLER/CLASSE/' . 'index.php', "w");
    $ACTION_security = fopen($path . $nomProjet . '/PHP/CONTROLLER/ACTION/' . 'index.php', "w");
    $SQL_security = fopen($path . $nomProjet . '/SQL/' . 'index.php', "w");



    // MESSAGE DE CONCLUSION DU PROGRAMME
    echo is_dir($repository) ? "Le dossier a été crée avec succès.\n" : "Le dossier n'a pas été crée, un problème est survenu, verifiez le répertoire de destination.\n";


    // CREATION DES VARIABLES PERMETTANT D'ECRIRE DANS LES FICHIERS CORRESPONDANTS
    if (is_dir($repository)) {
        $HTML_snippet = '<!doctype html>' . "\n"
            . '<html lang="fr">' . "\n"
            . '<head>' . "\n"
            . "\t" . '<meta charset="utf-8">' . "\n"
            . "\t" . '<title>'.$nomProjet.'</title>' . "\n"
            . "\t" . '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">' . "\n"
            . "\t" . '<link rel="stylesheet" href="../CSS/root.css">' . "\n"
            . "\t" . '<link rel="stylesheet" href="../CSS/grids.css">' . "\n"
            . "\t" . '<link rel="stylesheet" href="../CSS/style.css">' . "\n"
            . '</head>' . "\n"
            . '<body>' . "\n"
            . "\t" . '<header></header>' . "\n"
            . "\t" . '<nav></nav>' . "\n"
            . "\t" . '<!-- Le reste du contenu -->' . "\n"
            . "\t" . '<footer></footer>' . "\n"
            . "\t" . '<script src="../JS/script.js"></script>' . "\n"
            . '</body>' . "\n"
            . '</html>' . "\n";

        $ERROR_snippet = '<?php // fichier de protection des dossiers. ?>' . "\n" . '<h1>ERROR 404 NOT FOUND<h1>';

       
        $NAV_snippet = "<nav>\n";
        $INDEXPHP_snippet = '<?php'
            . "\n\n" . 'include "./PHP/CONTROLLER/Outils.php";'
            . "\n\n" . 'spl_autoload_register("ChargerClasse");'
            . "\n\n" . 'Parametres::init();'
            . "\n\n" . 'DbConnect::init();'
            . "\n\n" . 'session_start();'
            . "\n\n" . '/******Les langues******/'
            . "\n" . '/***On récupère la langue***/'
            . "\n" . 'if (isset($_GET[\'lang\']) && TextesManager::checkIfLangExist($_GET[\'lang\'])) {'
            . "\n\t" .' // tester si la langue est gérée'
            . "\n\t" . '$_SESSION[\'lang\'] = $_GET[\'lang\'];'
            . "\n" . '}else if (isset($_COOKIE[\'lang\'])) {'
            . "\n\t" . '$_SESSION[\'lang\'] = $_COOKIE[\'lang\'];'
            . "\n" . '}else{'
            . "\n\t" . '$_SESSION[\'lang\'] = \'FR\';'
            . "\n" . '}'
            . "\n" . '//Crée un cookie lang sur la machine de l\'utilisateur d\'une durée de 10h.'
            . "\n" . 'setcookie("lang", $_SESSION[\'lang\'], time()+36000, \'/\');'
            . "\n" . '/******Fin des langues******/'
            . "\n\n" . '$routes=['
            . "\n\t" . '"Default"=>["PHP/VIEW/FORM/","FormInscriptionConnexion","Connexion & Inscription",0,false],'
            . "\n\t" . '"Accueil"=>["PHP/VIEW/GENERAL/","Accueil","Accueil",0,false],'
            . "\n" 
            . "\n\t" . '"ActionConnexion"=>["PHP/CONTROLLER/ACTION/","ActionConnexion","Action de la connexion",0,false],'
            . "\n\t" . '"ActionInscription"=>["PHP/CONTROLLER/ACTION/","ActionInscription","Action de l\'inscription",0,false],'
            . "\n\t" . '"ActionDeconnexion"=>["PHP/CONTROLLER/ACTION/","ActionDeconnexion","Action de deconnexion",0,false],'
            . "\n"
            . "\n\t" . '"ListeMailAPI"=>["PHP/MODEL/API/","ListeMailAPI", "ListeMailAPI",0,true],'
            . "\n";
            foreach ($tables as $uneTable)
            {
                 $uneTable=ucfirst($uneTable);
                 $INDEXPHP_snippet .= "\n\t" . '"Liste'.$uneTable.'"=>["PHP/VIEW/LISTE/","Liste'.$uneTable.'","Liste '.$uneTable.'",0,false],'
                  . "\n\t" . '"Form'.$uneTable.'"=>["PHP/VIEW/FORM/","Form'.$uneTable.'","Formulaire '.$uneTable.'",0,false],'
                  . "\n\t" . '"Action'.$uneTable.'"=>["PHP/CONTROLLER/ACTION/","Action'.$uneTable.'","Action '.$uneTable.'",0,false],'
                  ."\n";
                  $NAV_snippet .= "<div><a href='?page=Liste".$uneTable."'>".$uneTable."</a></div>\n";
            }
            $NAV_snippet .="</nav>";

         $INDEXPHP_snippet .=   
             "\n" . '];'
            . "\n\n" . 'if(isset($_GET["page"]))'
            . "\n" . '{'
            . "\n\n\t" . '$page=$_GET["page"];'
            . "\n\n\t" . 'if(isset($routes[$page]))'
            . "\n\t" . '{'
            . "\n\t\t" . 'AfficherPage($routes[$page]);'
            . "\n\t" . '}'
            . "\n\t" . 'else'
            . "\n\t" . '{'
            . "\n\t\t" . 'AfficherPage($routes["Default"]);'
            . "\n\t" . '}'
            . "\n" . '}'
            . "\n" . 'else'
            . "\n" . '{'
            . "\n\t" . 'AfficherPage($routes["Default"]);'
            . "\n" . '}';

        $PARAMETRES_snippet = '{'
            . "\n\t" . '"Host":"'.$file->Server.'",'
            . "\n\t" . '"Port":"'.$file->Port.'",'
            . "\n\t" . '"DbName":"' . $nomDB.'",'
            . "\n\t" . '"Login":"'.$file->Username.'",'
            . "\n\t" . '"Pwd":"'.$file->Password.'"'
            . "\n}";

        
        $TEXTEMANAGER_snippet = '<?php'
            . "\n\n" . 'class TextesManager'
            . "\n" . '{'
            . "\n\n\t" . 'public static function findByCodes($codeLangue,$codeTexte)'
            . "\n\t" . '{'
            . "\n\t\t" . ' $texte=DAO::select([$codeLangue],"textes",["codeTexte" => $codeTexte],null,null,true);'
            . "\n\t\t" . ' if($texte==false) return false;'
            . "\n\t\t" . ' return $texte[0][$codeLangue];'
            . "\n\t" .'}'
            . "\n\n\t" . 'public static function checkIfLangExist($codeLangue)'
            . "\n\t" . '{'
            . "\n\t\t" . '$db=DbConnect::getDb();'
            . "\n\t\t" . '$q=$db->prepare("SHOW COLUMNS FROM textes LIKE :codeLangue");'
            . "\n\t\t" . '$q->bindValue(":codeLangue", $codeLangue, PDO::PARAM_STR);'
            . "\n\t\t" . '$q->execute();'
            . "\n\t\t" . '$results = $q->fetch(PDO::FETCH_ASSOC);'
            . "\n\t\t" . 'return ($results != false); // renvoi vrai si la requete retourne des données, false sinon'
            . "\n\t" .'}'
            . "\n" .'}';

        $SQL_snippet = 'USE '.$nomDB.';'
            . "\n\n" . 'CREATE TABLE IF NOT EXISTS utilisateurs ('
            . "\n" . 'idUtilisateur int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,'
            . "\n" . 'nom varchar(50) NOT NULL,'
            . "\n" . 'prenom varchar(50) NOT NULL,'
            . "\n" . 'adresseMail varchar(50) UNIQUE NOT NULL,'
            . "\n" . 'motDePasse varchar(50) NOT NULL,'
            . "\n" . 'role int(11) NOT NULL COMMENT \'2 Admin 1 User\''
            . "\n" . ') ENGINE = InnoDB DEFAULT CHARSET = utf8;'

            . "\n\n" . 'CREATE TABLE IF NOT EXISTS textes ('
            . "\n" . 'idTexte int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,'
            . "\n" . 'codeTexte varchar (50) NOT NULL,'
            . "\n" . 'fr LONGTEXT NOT NULL,'
            . "\n" . 'en LONGTEXT NOT NULL'
            . "\n" . ') ENGINE = InnoDB DEFAULT CHARSET = utf8;';


        // ECRITURE DU TEXTE CONTENU DANS LES VARIABLES CI-DESSUS
        fputs($HTML_file, $HTML_snippet);
        fputs($GENERAL_INDEX_file, $INDEXPHP_snippet);
        fputs($PARAMETRES_file, $PARAMETRES_snippet);
        fputs($TEXTEMANAGER_file, $TEXTEMANAGER_snippet);
        fputs($SQL_file, $SQL_snippet);
        fputs($VIEW_NAVPHP_file,$NAV_snippet);

        // ECRITURE DES PAGES ERROR 404 NOT FOUND DNAS LES FICHIERS DE SECURITE DE NIVEAU 1
        fputs($IMG_security, $ERROR_snippet);
        fputs($HTML_security, $ERROR_snippet);
        fputs($CSS_security, $ERROR_snippet);
        fputs($JS_security, $ERROR_snippet);
        fputs($PHP_security, $ERROR_snippet);
        fputs($MODEL_security, $ERROR_snippet);
        fputs($VIEW_security, $ERROR_snippet);
        fputs($CONTROLLER_security, $ERROR_snippet);
        fputs($SQL_security, $ERROR_snippet);
        fputs($SQL_security, $ERROR_snippet);
        fputs($DOCS_security, $ERROR_snippet);
        fputs($API_security, $ERROR_snippet);
        fputs($MANAGER_security, $ERROR_snippet);
        fputs($CLASSE_security, $ERROR_snippet);
        fputs($ACTION_security, $ERROR_snippet);
        fputs($FORM_security, $ERROR_snippet);
        fputs($GENERAL_security, $ERROR_snippet);
        fputs($LISTE_security, $ERROR_snippet);

    } else {
        echo "Un problème est survenu lors de l'insertion du texte dans les différents dossiers.";
    }
}
