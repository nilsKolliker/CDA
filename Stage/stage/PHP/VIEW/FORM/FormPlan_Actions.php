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
	$elm = Plan_ActionsManager::findById($_GET['id']);
	$listePlaning=Plan_PlanningsManager::getList(null,["idAction"=>$elm->getIdAction()],"idJour");
	$listeAffectation=Plan_AffectationsManager::getList(null,["idAction"=>$elm->getIdAction()]);
} else {
	$elm = new Plan_Actions();
	$elm-> setActive(1);
	$listePlaning=[];
	$listeAffectation=[];
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
$listeUtilisateur=Plan_UtilisateursManager::getList(null,["role"=>2]);
echo '<main class="center">';

echo '<form class="flex colonne" action="index.php?page=ActionPlan_Actions&mode='.$_GET['mode'].'" method="post"/>';
echo '<div class="GridForm">';

echo '<div class="caseForm titreForm col-span-form">Formulaire Plan_Actions</div>';
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getIdAction().'" name=IdAction></div>';
echo '<label for=NumOffre class="caseForm labelForm">'.texte("NumOffre").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getNumOffre().'" name=NumOffre pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=DateDebut class="caseForm labelForm">'.texte("DateDebut").'</label>';
echo '<div class="caseForm donneeForm"><input type="date" '.$disabled .'value="'.$elm->getDateDebut().'" name=DateDebut pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=NbrDHeure class="caseForm labelForm">'.texte("NbrDHeure").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getNbrDHeure().'" name=NbrDHeure pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=NbrStagiaire class="caseForm labelForm">'.texte("NbrStagiaire").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getNbrStagiaire().'" name=NbrStagiaire pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=idTypeMarche class="caseForm labelForm">'.texte("idTypeMarche").'</label>';
echo '<div class="caseForm donneeForm">'.creerSelect($elm->getIdTypeMarche(),"Plan_TypeMarches",['libelle'],$disabled,null,"libelle").'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=TauxHoraire class="caseForm labelForm">'.texte("TauxHoraire").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getTauxHoraire().'" name=TauxHoraire pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=DateDebutCertif class="caseForm labelForm">'.texte("DateDebutCertif").'</label>';
echo '<div class="caseForm donneeForm"><input type="date" '.$disabled .'value="'.$elm->getDateDebutCertif().'" name=DateDebutCertif pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=DateFinCertif class="caseForm labelForm">'.texte("DateFinCertif").'</label>';
echo '<div class="caseForm donneeForm"><input type="date" '.$disabled .'value="'.$elm->getDateFinCertif().'" name=DateFinCertif pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Active class="caseForm labelForm">'.texte("Active").'</label>';
echo '<div class="caseForm donneeForm">'.CreerSelectByArray($elm->getActive(),[1=>'Oui',0=>'Non'],"Active",$disabled).'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=IdCentre class="caseForm labelForm">'.texte("IdCentre").'</label>';
echo '<div class="caseForm donneeForm">'.creerSelect($elm->getIdCentre(),"Plan_Centres",['libelle'],$disabled,null,"libelle").'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=IdFormation class="caseForm labelForm">'.texte("IdFormation").'</label>';
echo '<div class="caseForm donneeForm">'.creerSelect($elm->getIdFormation(),"Plan_Formations",['libelleCourt','libelleLong'],$disabled,null,"libelleCourt").'</div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo'</div>';

echo '<div class="bigEspace"></div>';

echo '<div id="zoneAffectation" class="grid-col-4 gridListe">';
echo '<label class="labelForm">Formateurs :</label>';
$temp=$disabled==" "?'<button id="boutonAjouterAffectation" type=button><i class="fas fa-plus"></i></button>':"";
echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
$temp=$disabled==" "?'<button class="boutonSupprimerAffectation" type=button><i class="fas fa-trash-alt"></i></button>':"";
foreach ($listeAffectation as $Affectation) {
	echo'<div>';
	echo '<select name="modifierAffectation '.$Affectation->getIdAffectation().'" '.$disabled.'>';
	echo '<option value="">Choisir une valeur</option>';
	foreach ($listeUtilisateur as $utilisateur) {
		$selected=$utilisateur->getItilisateur()===$Affectation->getIdUtilisateur()?"selected":"";
		echo'<option '.$selected.' value="'.$utilisateur->getIdUtilisateur().'">'.$utilisateur->getLibelle().'</option>';
	}
	echo '</select>';
	echo '<input type="date" name="modifierAbsenceDebut '.$Absence->getIdAbsence().'" value="'.$Absence->getDateDebut().'" '.$disabled.'>';
	echo '<input type="date" name="modifierAbsenceFin '.$Absence->getIdAbsence().'" value="'.$Absence->getDateFin().'" '.$disabled.'>';
	echo'</div>';
	echo '<div></div><div class="caseListe">'.$temp.'</div><div></div>';
}
echo'</div>';



echo'<div class="colonne">';
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
echo'</div>';



echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListePlan_Actions"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';