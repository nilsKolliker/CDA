<?php

include "./PHP/CONTROLLER/Outils.php";

spl_autoload_register("ChargerClasse");

Parametres::init();

DbConnect::init();

session_start();

/******Les langues******/
/***On récupère la langue***/
if (isset($_GET['lang']) && TextesManager::checkIfLangExist($_GET['lang'])) {
	 // tester si la langue est gérée
	$_SESSION['lang'] = $_GET['lang'];
}else if (isset($_COOKIE['lang'])) {
	$_SESSION['lang'] = $_COOKIE['lang'];
}else{
	$_SESSION['lang'] = 'FR';
}
//Crée un cookie lang sur la machine de l'utilisateur d'une durée de 10h.
setcookie("lang", $_SESSION['lang'], time()+36000, '/');
/******Fin des langues******/

$routes=[
	"Default"=>["PHP/VIEW/FORM/","FormInscriptionConnexion","Connexion & Inscription",0,false],
	"Accueil"=>["PHP/VIEW/GENERAL/","Accueil","Accueil",0,false],

	"ActionConnexion"=>["PHP/CONTROLLER/ACTION/","ActionConnexion","Action de la connexion",0,false],
	"ActionInscription"=>["PHP/CONTROLLER/ACTION/","ActionInscription","Action de l'inscription",0,false],
	"ActionDeconnexion"=>["PHP/CONTROLLER/ACTION/","ActionDeconnexion","Action de deconnexion",0,false],

	"ListeMailAPI"=>["PHP/MODEL/API/","ListeMailAPI", "ListeMailAPI",0,true],
	"LDAPI"=>["PHP/MODEL/API/","ListeDepartementAPI", "",0,true],
	"LVAPI"=>["PHP/MODEL/API/","ListeVilleAPI", "",0,true],
	"InfoVilleAPI"=>["PHP/MODEL/API/","InfoVilleAPI", "",0,true],

	"ListeDepartements"=>["PHP/VIEW/LISTE/","ListeDepartements","Liste Departements",0,false],
	"FormDepartements"=>["PHP/VIEW/FORM/","FormDepartements","Formulaire Departements",0,false],
	"ActionDepartements"=>["PHP/CONTROLLER/ACTION/","ActionDepartements","Action Departements",0,false],

	"ListeRegions"=>["PHP/VIEW/LISTE/","ListeRegions","Liste Regions",0,false],
	"FormRegions"=>["PHP/VIEW/FORM/","FormRegions","Formulaire Regions",0,false],
	"ActionRegions"=>["PHP/CONTROLLER/ACTION/","ActionRegions","Action Regions",0,false],

	"ListeUtilisateurs"=>["PHP/VIEW/LISTE/","ListeUtilisateurs","Liste Utilisateurs",0,false],
	"FormUtilisateurs"=>["PHP/VIEW/FORM/","FormUtilisateurs","Formulaire Utilisateurs",0,false],
	"ActionUtilisateurs"=>["PHP/CONTROLLER/ACTION/","ActionUtilisateurs","Action Utilisateurs",0,false],

	"ListeVillesFrance"=>["PHP/VIEW/LISTE/","ListeVillesFrance","Liste VillesFrance",0,false],
	"FormVillesFrance"=>["PHP/VIEW/FORM/","FormVillesFrance","Formulaire VillesFrance",0,false],
	"ActionVillesFrance"=>["PHP/CONTROLLER/ACTION/","ActionVillesFrance","Action VillesFrance",0,false],

];

if(isset($_GET["page"]))
{

	$page=$_GET["page"];

	if(isset($routes[$page]))
	{
		AfficherPage($routes[$page]);
	}
	else
	{
		AfficherPage($routes["Accueil"]);
	}
}
else
{
	AfficherPage($routes["Accueil"]);
}