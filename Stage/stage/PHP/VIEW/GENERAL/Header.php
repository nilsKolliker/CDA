<body class="colonne">
    <header>
        <div class="mini"></div>
        <div class="mini"><img src="IMG/layout_set_logo.jpg" alt="Logo AFPA"></div>
        <div class="titre center"><?php echo texte($titre); ?></div>
        <div class="colonne mini">
            <?php

            if (isset($_SESSION['utilisateur'])) {
                echo '<div class="center">'. texte('Bonjour') ." ". $_SESSION['utilisateur']->getNom() . '</div>';
                echo '<div><a href="index.php?page=ActionDeconnexion" class="center">'. texte("Deconnexion") .'</a></div>';
            } else {
                echo '<a href="index.php?page=Default" class="center">'. texte("Connexion") .'</a>';
            }
            ?>

        </div>
        <div class="mini"></div>
    </header>