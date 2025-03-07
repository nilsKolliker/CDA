<?php
global $regex;
$mode = $_GET['mode'];
$disabled = " ";
switch ($mode) {
	case "Afficher":
	case "Supprimer":
		$disabled = " disabled ";
		break;
}

if (isset($_GET['id'])) {
	$elm = Plan_UtilisateursManager::findById($_GET['id']);
	$listePlaning=Plan_PlanningsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()],"idJour");
	$listeRattachement=Plan_RattachementsManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
	$listeAbsence=Plan_AbsencesManager::getList(null,["idUtilisateur"=>$elm->getIdUtilisateur()]);
} else {
	$elm = new Plan_Utilisateurs();
	$listeRattachement=[];
	$listeAbsence=[];
	$listePlaning=[];
}
for ($i=0; $i < 5; $i++) { 
	$tabHoraire["matin"]["debut"][$i]=null;
	$tabHoraire["matin"]["fin"][$i]=null;
	$tabHoraire["apresMidi"]["debut"][$i]=null;
	$tabHoraire["apresMidi"]["fin"][$i]=null;
}
foreach ($listePlaning as $planing) {
	$tabHoraire["matin"]["debut"][$planing->getIdJour()]=$planing->getHeureMatinDebut();
	$tabHoraire["matin"]["fin"][$planing->getIdJour()]=$planing->getHeureMatinFin();
	$tabHoraire["apresMidi"]["debut"][$planing->getIdJour()]=$planing->getHeureApresMidiDebut();
	$tabHoraire["apresMidi"]["fin"][$planing->getIdJour()]=$planing->getHeureApresMidiFin();
}
$listeCentre=Plan_CentresManager::getList();

echo '<main class="center">';

echo '<form class="flex colonne" action="index.php?page=ActionPlan_Utilisateurs&mode='.$_GET['mode'].'" method="post"/>';
echo '<div class="GridForm">';

echo '<div class="caseForm titreForm col-span-form">Formulaire Utilisateurs</div>';
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getIdUtilisateur().'" name=IdUtilisateur></div>';
echo '<label for=Matricule class="caseForm labelForm">'.texte("Matricule").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getMatricule().'" name=Matricule pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Nom class="caseForm labelForm">'.texte("Nom").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getNom().'" name=Nom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Prenom class="caseForm labelForm">'.texte("Prenom").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getPrenom().'" name=Prenom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Email class="caseForm labelForm">'.texte("Email").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getEmail().'" name=Email pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

// echo '<label for=Mdp class="caseForm labelForm">'.texte("Mdp").'</label>';
// echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getMdp().'" name=Mdp pattern="'.$regex["*"].'"></div>';
// echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
// echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Role class="caseForm labelForm">'.texte("Role").'</label>';
echo '<div class="caseForm donneeForm">'.CreerSelectByArray($elm->getRole(),ROLES,'role',$disabled).'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=IdCentre class="caseForm labelForm">'.texte("Centre d'origine").'</label>';
echo '<div class="caseForm donneeForm">'.creerSelect($elm->getIdCentre(),"Plan_Centres",['libelle'],$disabled,null,"libelle").'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

if ($elm->getIdUtilisateur()==$_SESSION["utilisateur"]->getIdUtilisateur()) {
	echo '<label for=IdCentre class="caseForm labelForm">'.texte("Mot de passe").'</label>';
	echo '<div class="caseForm donneeForm"><a href="index.php?page=FormChangeMDP&mode='.$_GET['mode'].'"><button type="button"> Changer son Mot de Passe</button></a></div>';
	echo '<div class="caseForm infoForm"></div>';
	echo '<div class="caseForm checkForm"></div>';
}

echo'</div>';

echo'<div id="zonePlanning" class="colonne"></div>';

echo '<div class="bigEspace"></div>';

echo '<div id="zoneRattachement" class="grid-col-4 gridListe">';
echo '<label class="labelForm">Centres Rattachés :</label>';
$temp=$disabled==" "?'<button id="boutonAjouterRattachement" type=button><i class="fas fa-plus"></i></button>':"";
echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
$temp=$disabled==" "?'<button class="boutonSupprimerRattachement" type=button><i class="fas fa-trash-alt"></i></button>':"";
foreach ($listeRattachement as $Rattachement) {
	echo '<select name="modifierRattachement '.$Rattachement->getIdRattachement().'" '.$disabled.'>';
	echo '<option value="">Choisir une valeur</option>';
	foreach ($listeCentre as $centre) {
		$selected=$centre->getIdCentre()===$Rattachement->getIdCentre()?"selected":"";
		echo'<option '.$selected.' value="'.$centre->getIdCentre().'">'.$centre->getLibelle().'</option>';
	}
	echo '</select>';
	echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
}
echo'</div>';

echo '<div class="bigEspace"></div>';

echo '<div id="zoneAbsence" class="grid-col-4 gridListe"></div>';

echo '<div class="bigEspace"></div>';

echo '<div class="GridForm">';
echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListePlan_Utilisateurs"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';
echo'</div>';

echo'</form>';

echo'<template id="planning">';
echo '<div class="bigEspace"></div>';
echo'<div>Répartition des heures:</div>';
echo'<div>
<div></div>
<div>Lundi</div>
<div>Mardi</div>
<div>Mercredi</div>
<div>Jeudi</div>
<div>Vendredi</div>
</div>';
echo'<div>
<div>Matin</div>';
for ($i=0; $i < 5; $i++) { 
	echo'<div class="colonne">
	<input type="time" name="matinD'.$i.'" value="'.$tabHoraire["matin"]["debut"][$i].'"'.$disabled.'>
	<input type="time" name="matinF'.$i.'" value="'.$tabHoraire["matin"]["fin"][$i].'"'.$disabled.'>
	</div>';
}
echo'</div>
<div class="bigEspace"></div>
<div>
<div>Apres Midi</div>';
for ($i=0; $i < 5; $i++) { 
	echo'<div class="colonne">
	<input type="time" name="apresMidiD'.$i.'" value="'.$tabHoraire["apresMidi"]["debut"][$i].'"'.$disabled.'>
	<input type="time" name="apresMidiF'.$i.'" value="'.$tabHoraire["apresMidi"]["fin"][$i].'"'.$disabled.'>
	</div>';
}
echo'</div>';
echo'</template>';

echo'<template id="templateRattachement">';
echo '<select>';
echo '<option value="">Choisir une valeur</option>';
foreach ($listeCentre as $centre) {
	echo'<option value="'.$centre->getIdCentre().'">'.$centre->getLibelle().'</option>';
}
echo '</select>';
echo '<div></div><div class="caseListe"><button class="boutonSupprimerRattachement" type=button><i class="fas fa-trash-alt"></i></button></div><div></div>';
echo'</template>';

echo'<template id="templateAbsence">';
echo '<label class="labelForm">Congé  :</label>';
$temp=$disabled==" "?'<button id="boutonAjouterAbsence" type=button><i class="fas fa-plus"></i></button>':"";
echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
$temp=$disabled==" "?'<button class="boutonSupprimerAbsence" type=button><i class="fas fa-trash-alt"></i></button>':"";
foreach ($listeAbsence as $Absence) {
	echo '<div id="modifierAbsence '.$Absence->getIdAbsence().'">';
	echo '<input type="date" name="modifierAbsenceDebut '.$Absence->getIdAbsence().'" value="'.$Absence->getDateDebut().'" '.$disabled.'>';
	echo '<input type="date" name="modifierAbsenceFin '.$Absence->getIdAbsence().'" value="'.$Absence->getDateFin().'" '.$disabled.'>';
	echo '</div>';
	echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
}
echo'</template>';

echo '<template id="templateAjouterAbsence">';
echo '<div id="divInput">';
echo '<input id="debutAbsence" type="date">';
echo '<input id= "finAbsence" type="date">';
echo '</div>';
echo '<div></div><div class="caseListe"><button class="boutonSupprimerAbsence" type=button><i class="fas fa-trash-alt"></i></button></div><div></div>';
echo'</template>';
echo '</main>';