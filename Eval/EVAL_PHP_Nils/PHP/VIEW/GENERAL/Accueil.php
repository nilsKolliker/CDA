<main class>
    <div class="demi"></div>
    <div class="colonne">
        <?php
        $categ=TypesArticlesManager::getList();
        foreach ($categ as $uneCateg) {
            echo'<div>Type : '.$uneCateg->getLibelleTypeArticle().'</div>';
            echo'<div>';
            $produits=ArticlesManager::getList(null,["IdTypeArticle"=>$uneCateg->getIdTypeArticle()]);
            foreach ($produits as $unProduit) {
                echo'<div class="colonne">';
                    echo'<img src="IMG/'.$unProduit->getPhotos().'" alt="L\'image de '.$unProduit->getLibelleArticle().'">';
                    echo'<div>';
                        echo'<div class="colonne">';
                            echo'<div>'.$unProduit->getLibelleArticle().'</div>';
                            echo'<div>'.$unProduit->getDescriptionArticle().'</div>';
                        echo'</div>';
                        if ($_SESSION['utilisateur']->getRole()==1) {

                            echo '<div class="caseListe"> <a href="index.php?page=ActionLignesPaniers&mode=Ajouter&idArticle='.$unProduit->getIdArticle().'"><i class="fas fa-shopping-cart"></i></a></div>';

                        }
                    echo'</div>';
                echo'</div>';
            }
            echo'</div>';
        }
        ?>
    </div>
    <div class="demi"></div>
</main>