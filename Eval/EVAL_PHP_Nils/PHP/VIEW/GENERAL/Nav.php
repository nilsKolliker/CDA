<nav>
    <div></div>
    <?php 
        if ($_SESSION['utilisateur']->getRole()>1) {
            echo"<div class='menu'><a href='?page=ListeArticles'>Articles</a></div>";
            echo"<div class='menu'><a href='?page=ListeTypesArticles'>Types d'articles</a></div>";
            echo"<div class='menu'><a href='?page=ListePaniers'>Paniers</a></div>";
            echo"<div class='menu'><a href='?page=ListeUtilisateurs'>Clients</a></div>";
        }else{
            echo"<div class='menu'><a href='?page=ListeLignesPaniers'>Paniers</a></div>";
        }
        echo"<div class='menu'><a href='?page=Accueil'>Catalogue</a></div>";
    ?>
    <div></div>
</nav>