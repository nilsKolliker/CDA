<?php
echo JSON_encode(VillesFranceManager::getList(null,["ville_id" => $_POST["idVille"]],null,null,true));