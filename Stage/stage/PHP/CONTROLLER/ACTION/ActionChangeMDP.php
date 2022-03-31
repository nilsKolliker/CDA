<?php
if ($_POST['motDePasse'] == $_POST['confirmPassword']) {
    $_SESSION['utilisateur']->setMdp(crypte($_POST['motDePasse']));
    Plan_UtilisateursManager::update($_SESSION['utilisateur']);
    header("location:index.php?page=FormPlan_Utilisateurs&mode=".$_GET['mode']."&id=".$_SESSION['utilisateur']->getIdUtilisateur());
}else{
    header("location:index.php?page=FormChangeMDP&mode=".$_GET['mode']);
}