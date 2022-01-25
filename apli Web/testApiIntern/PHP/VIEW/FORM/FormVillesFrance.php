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
	$elm = VillesFranceManager::findById($_GET['id']);
} else {
	$elm = new VillesFrance();
}
echo '<main class="center">';

echo '<form class="GridForm" action="index.php?page=ActionVillesFrance&mode='.$_GET['mode'].'" method="post"/>';

echo '<div class="caseForm col-span-form">Formulaire VillesFrance</div>';
if ($mode != "Ajouter") {
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getVille_id().'" name=Ville_id></div>';
};
echo '<div class="caseForm">Ville_departement</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_departement()."'"; echo ' name=Ville_departement pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_slug</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_slug()."'"; echo ' name=Ville_slug pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_nom</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_nom()."'"; echo ' name=Ville_nom pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_nom_simple</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_nom_simple()."'"; echo ' name=Ville_nom_simple pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_nom_reel</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_nom_reel()."'"; echo ' name=Ville_nom_reel pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_nom_soundex</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_nom_soundex()."'"; echo ' name=Ville_nom_soundex pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_nom_metaphone</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_nom_metaphone()."'"; echo ' name=Ville_nom_metaphone pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_code_postal</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_code_postal()."'"; echo ' name=Ville_code_postal pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_commune</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_commune()."'"; echo ' name=Ville_commune pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_code_commune</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_code_commune()."'"; echo ' name=Ville_code_commune pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_arrondissement</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_arrondissement()."'"; echo ' name=Ville_arrondissement pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_canton</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_canton()."'"; echo ' name=Ville_canton pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_amdi</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_amdi()."'"; echo ' name=Ville_amdi pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_population_2010</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_population_2010()."'"; echo ' name=Ville_population_2010 pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_population_1999</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_population_1999()."'"; echo ' name=Ville_population_1999 pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_population_2012</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_population_2012()."'"; echo ' name=Ville_population_2012 pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_densite_2010</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_densite_2010()."'"; echo ' name=Ville_densite_2010 pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_surface</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_surface()."'"; echo ' name=Ville_surface pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_longitude_deg</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_longitude_deg()."'"; echo ' name=Ville_longitude_deg pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_latitude_deg</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_latitude_deg()."'"; echo ' name=Ville_latitude_deg pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_longitude_grd</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_longitude_grd()."'"; echo ' name=Ville_longitude_grd pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_latitude_grd</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_latitude_grd()."'"; echo ' name=Ville_latitude_grd pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_longitude_dms</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_longitude_dms()."'"; echo ' name=Ville_longitude_dms pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_latitude_dms</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_latitude_dms()."'"; echo ' name=Ville_latitude_dms pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_zmin</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_zmin()."'"; echo ' name=Ville_zmin pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Ville_zmax</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getVille_zmax()."'"; echo ' name=Ville_zmax pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListeVillesFrance"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';