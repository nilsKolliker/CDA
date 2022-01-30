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

echo '<main class="center">';

echo '<form class="GridForm" data-mode='.$_GET['mode'].' method="post"/>';

echo '<div class="caseForm titreForm col-span-form">Formulaire Utilisateurs</div>';
	echo '<div class="noDisplay"><input type="hidden" value="'.(isset($_GET['id'])?$_GET['id']:"").'" name=IdUtilisateur></div>';
echo '<label for=Nom class="caseForm labelForm">'.texte("Nom").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'" name=Nom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Prenom class="caseForm labelForm">'.texte("Prenom").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'" name=Prenom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=AdresseMail class="caseForm labelForm">'.texte("AdresseMail").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'" name=AdresseMail pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=MotDePasse class="caseForm labelForm">'.texte("MotDePasse").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'" name=MotDePasse pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<label for=Role class="caseForm labelForm">'.texte("Role").'</label>';
echo '<div class="caseForm donneeForm"><input type="text" '.$disabled .'" name=Role pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm infoForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm checkForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListeUtilisateurs"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button name='submit' type=\"button\" disabled ><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';
?>
<script src="./JS/AjaxForm.js"></script>