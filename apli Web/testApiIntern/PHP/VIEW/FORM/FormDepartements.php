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
	$elm = DepartementsManager::findById($_GET['id']);
} else {
	$elm = new Departements();
}
echo '<main class="center">';

echo '<form class="GridForm" action="index.php?page=ActionDepartements&mode='.$_GET['mode'].'" method="post"/>';

echo '<div class="caseForm col-span-form">Formulaire Departements</div>';
if ($mode != "Ajouter") {
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getDepartement_id().'" name=Departement_id></div>';
};
echo '<div class="caseForm">Departement_code</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_code()."'"; echo ' name=Departement_code pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Departement_nom</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_nom()."'"; echo ' name=Departement_nom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Departement_nom_uppercase</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_nom_uppercase()."'"; echo ' name=Departement_nom_uppercase pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Departement_slug</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_slug()."'"; echo ' name=Departement_slug pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Departement_nom_soundex</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_nom_soundex()."'"; echo ' name=Departement_nom_soundex pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Departement_regionId</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDepartement_regionId()."'"; echo ' name=Departement_regionId pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListeDepartements"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';