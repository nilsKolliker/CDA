<?php
echo JSON_encode(creerSelect(null,"villesfrance",["ville_code_postal","ville_nom_reel"],"",["ville_departement"=>$_POST["codeDep"]],"ville_code_postal",false,"--Choisir une ville--"));