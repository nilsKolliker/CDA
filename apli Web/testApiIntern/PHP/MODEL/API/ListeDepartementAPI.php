<?php
echo JSON_encode(creerSelect(null,"departements",["departement_code","departement_nom"],"",["departement_regionId"=>$_POST["idRegion"]],"departement_id",false,"--Choisir un departement--"));