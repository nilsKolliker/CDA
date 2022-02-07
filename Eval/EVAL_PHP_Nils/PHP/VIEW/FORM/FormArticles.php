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
	$elm = ArticlesManager::findById($_GET['id']);
} else {
	$elm = new Articles();
}
echo '<main class="center">';

echo '<form class="GridForm" action="index.php?page=ActionArticles&mode='.$_GET['mode'].'" method="post"/>';

echo '<div class="caseForm col-span-form">Formulaire Articles</div>';
if ($mode != "Ajouter") {
	echo '<div class="noDisplay"><input type="hidden" value="'.$elm->getIdArticle().'" name=IdArticle></div>';
};
echo '<div class="caseForm">LibelleArticle</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getLibelleArticle()."'"; echo ' name=LibelleArticle pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">DescriptionArticle</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getDescriptionArticle()."'"; echo ' name=DescriptionArticle pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">PrixArticle</div>';
echo '<div class="caseForm"><input type="text" '.$disabled;
echo " value='".$elm->getPrixArticle()."'"; echo ' name=PrixArticle pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">IdTypeArticle</div>';
echo '<div class="caseForm">';
echo creerSelect(1,"typesarticles",["LibelleTypeArticle"],$disabled);
echo '</div>';
echo '<div class="caseForm"><i class="fas fa-question-circle"></i></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm">Photos</div>';
echo '<div class="caseForm"><img id="imageProduit" src="" alt="L\'image du produit"></div>';
echo '<div class="caseForm"><input type="file" '.$disabled;
echo " value='".$elm->getPhotos()."'"; echo ' name=Photos pattern="'.$regex["*"].'"></div>';
echo '<div class="caseForm"><i class="fas fa-check-circle"></i></div>';

echo '<div class="caseForm col-span-form">
	<div></div>
	<div><a href="index.php?page=ListeArticles"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a></div>
	<div class="flex-0-1"></div>';
	echo ($mode == "Afficher") ? "" : " <div><button type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button></div>";
	echo'<div></div>
	</div>';

echo'</form>';

echo '</main>';
echo ' <script src="./JS/photo.js"></script>';