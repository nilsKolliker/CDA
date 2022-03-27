<?php
global $regex;
?>
<div class="bigEspace"></div>
<div class="bigEspace"></div>
<div class="bigEspace"></div>
<div class="bigEspace"></div>
<main>
    <div class="demi"></div>
    <section class="center colonne encadre relative">
        <div class="absolu circleCo cadreCo">
            <div class="absolu circleCo teteCo"></div>
            <div class="absolu circleCo corpCo"></div>
        </div>
        <div class="bigEspace"></div>
        <div class="bigEspace"></div>
        <form action="index.php?page=ActionConnexion" method="POST">
            <div class="colSpan2 center"><h1><?php echo texte('Connexion') ?></h1></div>

            <label for="email"><?php echo texte('AdresseEmail') ?> : </label>
            <input type="text" name="email" required>

            <label for="mdp"><?php echo texte('Mdp') ?> : </label>
            <div class="relative">
                <input type="Password" name="mdp" required>
                <i class="oeil fas fa-eye"></i>
            </div>

            <div></div>
            <div></div>

            <div></div>
            <input type="submit" value="<?php echo texte('Envoyer') ?>">
        </form>
        <div class="bigEspace"></div>
    </section>
    <div class="demi"></div>
</main>