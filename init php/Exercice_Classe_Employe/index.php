<?php
function chargerClasse($classe){//new autoload
    if (file_exists("Class/" . $classe . ".class.php")){
        require "Class/" . $classe . ".class.php";
    }
}
spl_autoload_register("chargerClasse");
$listeAgence[]=new Agence(["nom"=>"A","adresse"=>"3 rue des champis","codePostal"=>"00001","ville"=>"bourgpomme","restaurant"=>true]);
$listeAgence[]=new Agence(["nom"=>"B","adresse"=>"5 rue des champs","codePostal"=>"00002","ville"=>"bourgopif","restaurant"=>false]);

$listeEnfant[]=new Enfant(["dateDeNaissance"=>"8/9/2015"]);
$listeEnfant[]=new Enfant(["dateDeNaissance"=>"3/6/2010"]);
$listeEnfant[]=new Enfant(["dateDeNaissance"=>"4/3/2005"]);
$listeEnfant[]=new Enfant(["dateDeNaissance"=>"25/12/2000"]);

$listeEmploye[]=new Employe(["prenom"=>"toto","dateDEmbauche"=>"1/1/2020", "salaire"=>1,"nom"=>"Dupond","poste"=>"troll", "service"=>"compta","agence"=>$listeAgence[0],"listeDEnfant"=>[$listeEnfant[0],$listeEnfant[0]]]);
$listeEmploye[]=new Employe(["prenom"=>"titi","dateDEmbauche"=>"3/1/2010", "salaire"=>1,"nom"=>"Dupont","poste"=>"trill", "service"=>"vente","agence"=>$listeAgence[0],"listeDEnfant"=>[$listeEnfant[0],$listeEnfant[1],$listeEnfant[2],$listeEnfant[3]]]);
$listeEmploye[]=new Employe(["prenom"=>"tata","dateDEmbauche"=>"02/03/2014", "salaire"=>1,"nom"=>"Durant","poste"=>"trall", "service"=>"compta","agence"=>$listeAgence[1],"listeDEnfant"=>[$listeEnfant[3],$listeEnfant[3]]]);
$listeEmploye[]=new Employe(["prenom"=>"tutu","dateDEmbauche"=>"4/7/2020", "salaire"=>1,"nom"=>"Durant","poste"=>"trull", "service"=>"vente","agence"=>$listeAgence[0]]);
$listeEmploye[]=new Employe(["prenom"=>"toto","dateDEmbauche"=>"31/12/2021", "salaire"=>1,"nom"=>"Durang","poste"=>"trell", "service"=>"direction","agence"=>$listeAgence[1]]);
foreach ($listeEmploye as $employe) {
    echo $employe->donneLaPrime();
}
echo "\n".count($listeEmploye)."\n\n";

usort($listeEmploye,["Employe","compareToByNomPrenom"]);
foreach ($listeEmploye as $employe) {
    echo $employe->toString()."\n";
}
echo"\n";
usort($listeEmploye,["Employe","compareToByServiceNomPrenom"]);
foreach ($listeEmploye as $employe) {
    echo $employe->toString()."\n";
}
$coutTotal=0;
foreach ($listeEmploye as $employe) {
    $coutTotal+= $employe->coutAnnuel();
}
echo"\n".$coutTotal."\n";