<?php
define('ROLES',['inactif','employée','formateur','direction']);
include "./PHP/CONTROLLER/Outils.php";

spl_autoload_register("ChargerClasse");

Parametres::init();

DbConnect::init();

session_start();

/******Les langues******/
/***On récupère la langue***/
if (isset($_GET['lang']) && Plan_TextesManager::checkIfLangExist($_GET['lang'])) {
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
	"Default"=>["PHP/VIEW/FORM/","FormInscriptionConnexion","Connexion",0,false],
	"Accueil"=>["PHP/VIEW/GENERAL/","Accueil","Accueil",1,false],

	"ActionConnexion"=>["PHP/CONTROLLER/ACTION/","ActionConnexion","Action de la connexion",0,false],
	"ActionDeconnexion"=>["PHP/CONTROLLER/ACTION/","ActionDeconnexion","Action de deconnexion",1,false],

	"ListeMailAPI"=>["PHP/MODEL/API/","ListeMailAPI", "ListeMailAPI",0,true],

	"ListePlan_Absences"=>["PHP/VIEW/LISTE/","ListePlan_Absences","Liste Plan_Absences",1,false],
	"FormPlan_Absences"=>["PHP/VIEW/FORM/","FormPlan_Absences","Formulaire Plan_Absences",1,false],
	"ActionPlan_Absences"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Absences","Action Plan_Absences",3,false],

	"ListePlan_Actions"=>["PHP/VIEW/LISTE/","ListePlan_Actions","Liste des Actions",1,false],
	"FormPlan_Actions"=>["PHP/VIEW/FORM/","FormPlan_Actions","Formulaire Actions",1,false],
	"ActionPlan_Actions"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Actions","Action Plan_Actions",3,false],

	"ListePlan_Affectations"=>["PHP/VIEW/LISTE/","ListePlan_Affectations","Liste Plan_Affectations",1,false],
	"FormPlan_Affectations"=>["PHP/VIEW/FORM/","FormPlan_Affectations","Formulaire Plan_Affectations",1,false],
	"ActionPlan_Affectations"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Affectations","Action Plan_Affectations",3,false],

	"ListePlan_Centres"=>["PHP/VIEW/LISTE/","ListePlan_Centres","Liste des Centres",1,false],
	"FormPlan_Centres"=>["PHP/VIEW/FORM/","FormPlan_Centres","Formulaire Centres",1,false],
	"ActionPlan_Centres"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Centres","Action Plan_Centres",3,false],

	"ListePlan_DistancielsPresentielsExceptionnels"=>["PHP/VIEW/LISTE/","ListePlan_DistancielsPresentielsExceptionnels","Liste Plan_DistancielsPresentielsExceptionnels",1,false],
	"FormPlan_DistancielsPresentielsExceptionnels"=>["PHP/VIEW/FORM/","FormPlan_DistancielsPresentielsExceptionnels","Formulaire Plan_DistancielsPresentielsExceptionnels",1,false],
	"ActionPlan_DistancielsPresentielsExceptionnels"=>["PHP/CONTROLLER/ACTION/","ActionPlan_DistancielsPresentielsExceptionnels","Action Plan_DistancielsPresentielsExceptionnels",3,false],

	"ListePlan_DistancielsRecurrents"=>["PHP/VIEW/LISTE/","ListePlan_DistancielsRecurrents","Liste Plan_DistancielsRecurrents",1,false],
	"FormPlan_DistancielsRecurrents"=>["PHP/VIEW/FORM/","FormPlan_DistancielsRecurrents","Formulaire Plan_DistancielsRecurrents",1,false],
	"ActionPlan_DistancielsRecurrents"=>["PHP/CONTROLLER/ACTION/","ActionPlan_DistancielsRecurrents","Action Plan_DistancielsRecurrents",3,false],

	"ListePlan_Formations"=>["PHP/VIEW/LISTE/","ListePlan_Formations","Liste des Formations",1,false],
	"FormPlan_Formations"=>["PHP/VIEW/FORM/","FormPlan_Formations","Formulaire Formations",1,false],
	"ActionPlan_Formations"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Formations","Action Plan_Formations",3,false],

	"ListePlan_Interruptions"=>["PHP/VIEW/LISTE/","ListePlan_Interruptions","Liste Plan_Interruptions",1,false],
	"FormPlan_Interruptions"=>["PHP/VIEW/FORM/","FormPlan_Interruptions","Formulaire Plan_Interruptions",1,false],
	"ActionPlan_Interruptions"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Interruptions","Action Plan_Interruptions",3,false],

	"ListePlan_Occupations"=>["PHP/VIEW/LISTE/","ListePlan_Occupations","Liste Plan_Occupations",1,false],
	"FormPlan_Occupations"=>["PHP/VIEW/FORM/","FormPlan_Occupations","Formulaire Plan_Occupations",1,false],
	"ActionPlan_Occupations"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Occupations","Action Plan_Occupations",3,false],

	"ListePlan_Organismes"=>["PHP/VIEW/LISTE/","ListePlan_Organismes","Liste Plan_Organismes",1,false],
	"FormPlan_Organismes"=>["PHP/VIEW/FORM/","FormPlan_Organismes","Formulaire Plan_Organismes",1,false],
	"ActionPlan_Organismes"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Organismes","Action Plan_Organismes",3,false],

	"ListePlan_PAE"=>["PHP/VIEW/LISTE/","ListePlan_PAE","Liste Plan_PAE",1,false],
	"FormPlan_PAE"=>["PHP/VIEW/FORM/","FormPlan_PAE","Formulaire Plan_PAE",1,false],
	"ActionPlan_PAE"=>["PHP/CONTROLLER/ACTION/","ActionPlan_PAE","Action Plan_PAE",3,false],

	"ListePlan_Plannings"=>["PHP/VIEW/LISTE/","ListePlan_Plannings","Liste Plan_Plannings",1,false],
	"FormPlan_Plannings"=>["PHP/VIEW/FORM/","FormPlan_Plannings","Formulaire Plan_Plannings",1,false],
	"ActionPlan_Plannings"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Plannings","Action Plan_Plannings",3,false],

	"ListePlan_Presences"=>["PHP/VIEW/LISTE/","ListePlan_Presences","Liste Plan_Presences",1,false],
	"FormPlan_Presences"=>["PHP/VIEW/FORM/","FormPlan_Presences","Formulaire Plan_Presences",1,false],
	"ActionPlan_Presences"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Presences","Action Plan_Presences",3,false],

	"ListePlan_Rattachements"=>["PHP/VIEW/LISTE/","ListePlan_Rattachements","Liste Plan_Rattachements",1,false],
	"FormPlan_Rattachements"=>["PHP/VIEW/FORM/","FormPlan_Rattachements","Formulaire Plan_Rattachements",1,false],
	"ActionPlan_Rattachements"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Rattachements","Action Plan_Rattachements",3,false],

	"ListePlan_Salles"=>["PHP/VIEW/LISTE/","ListePlan_Salles","Liste des Salles",1,false],
	"FormPlan_Salles"=>["PHP/VIEW/FORM/","FormPlan_Salles","Formulaire Salles",1,false],
	"ActionPlan_Salles"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Salles","Action Plan_Salles",3,false],

	"ListePlan_Soustraitances"=>["PHP/VIEW/LISTE/","ListePlan_Soustraitances","Liste Plan_Soustraitances",1,false],
	"FormPlan_Soustraitances"=>["PHP/VIEW/FORM/","FormPlan_Soustraitances","Formulaire Plan_Soustraitances",1,false],
	"ActionPlan_Soustraitances"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Soustraitances","Action Plan_Soustraitances",3,false],

	"ListePlan_Utilisateurs"=>["PHP/VIEW/LISTE/","ListePlan_Utilisateurs","Liste du Personnel",1,false],
	"FormPlan_Utilisateurs"=>["PHP/VIEW/FORM/","FormPlan_Utilisateurs","Formulaire Utilisateurs",1,false],
	"ActionPlan_Utilisateurs"=>["PHP/CONTROLLER/ACTION/","ActionPlan_Utilisateurs","Action Plan_Utilisateurs",3,false],
	"FormChangeMDP"=>["PHP/VIEW/FORM/","FormChangeMDP","Formulaire de Changement de Mot de Passe",1,false],
	"ActionChangeMDP"=>["PHP/CONTROLLER/ACTION/","ActionChangeMDP","Action ChangeMDP",1,false],
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
		AfficherPage($routes["Default"]);
	}
}
else
{
	AfficherPage($routes["Default"]);
}