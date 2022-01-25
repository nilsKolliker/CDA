<?php
echo JSON_encode(VillesFranceManager::getList(null,["ville_id" => $id],null,null,true));