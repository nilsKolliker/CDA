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
	$elm = Plan_DistancielsRecurrentsManager::findById($_GET['id']);
} else {
	$elm = new Plan_DistancielsRecurrents();
}
echo '<main class="center">';

echo '<form class="GridForm" action="index.php?page=ActionPlan_DistancielsRecurrents&mode='.$_GET['mode'].'" method="post"/>';

echo '<div class="caseForm titreForm col-span-form">Formulaire Plan_DistancielsRecurrents</div>';
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getIdDistancielRecurrent().'" name=IdDistancielRecurrent></div>';
echo '<label for=IdJour class="caseForm labelForm">'.texte("IdJour").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getIdJour().'" name=IdJour pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=IdAction class="caseForm labelForm">'.texte("IdAction").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'value="'.$elm->getIdAction().'" name=IdAction pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListePlan_DistancielsRecurrents"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';