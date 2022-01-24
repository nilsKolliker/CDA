<body class="colonne">
    <header>
        <div class="demi"></div>
        <div class="colonne demi">
            <div class="bigEspace"></div>
            <div>
                <div class="demi"></div>
                <img src="IMG/Thermometer+Thermomètre.jpg" alt="thermometre dans de l'eau">
                <div class="demi"></div>
            </div>
            <div class="bigEspace"></div>
        </div>
        <div class="titre double center"><h1><?php echo $titre; ?></h1></div>
        <div class="colonne demi">
            <?php

            if (isset($_SESSION['utilisateur'])) {
                echo '<div class="center">'. texte('Bonjour') ." ". $_SESSION['utilisateur']->getNom() . '</div>';
                echo '<div><a href="index.php?page=ActionDeconnexion" class="center">'. texte("Deconnexion") .'</a></div>';
            } else {
                echo '<a href="index.php?page=Default" class="center">'. texte("Connexion") .'</a>';
            }
            ?>

        </div>
        <div class="demi"></div>
    </header>
    <main class="colonne">