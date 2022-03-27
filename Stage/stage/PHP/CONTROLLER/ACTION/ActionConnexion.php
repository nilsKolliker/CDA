<?php
    
$uti =  Plan_UtilisateursManager::getList(null, ['email' => $_POST['email']]);
if ($uti != null) {
    if ($uti[0]->getMdp() == crypte($_POST['mdp'])) {       
        echo 'connection reussie';
        $_SESSION['utilisateur'] = $uti[0];
        header("location:index.php?page=Accueil");
    } else {
        header("location:index.php?page=Default");
    }
} else {
    header("location:index.php?page=Default");
}