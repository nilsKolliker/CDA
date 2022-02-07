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
	$elm = LignesPaniersManager::findById($_GET['id']);
} else {
	$elm = new LignesPaniers();
}
echo '<main class="center">';

echo '<form class="GridForm" action="index.php?page=ActionLignesPaniers&mode='.$_GET['mode'].'" method="post"/>';

echo '<div class="caseForm col-span-form">Formulaire LignesPaniers</div>';
if ($mode != "Ajouter") {
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getIdLignePanier().'" name=IdLignePanier></div>';
};
echo '<div class="caseForm">Article</div>';
echo '<div class="caseForm">';
echo creerSelect($elm->getIdArticle(),"articles",["LibelleArticle"],$disabled);
echo '</div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<input class="noDisplay" type="text" '.$disabled;
echo " value='".$elm->getIdPanier()."'"; echo ' name=IdPanier pattern="'.$regex["*"].'"></div>';

echo '<div class="caseForm">Quantite</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getQuantite()."'"; echo ' name=Quantite pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListeLignesPaniers"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';