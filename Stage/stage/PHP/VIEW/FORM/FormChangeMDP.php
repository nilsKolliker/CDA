<?php
global $regex;
?>
<main>
    <div class="demi"></div>
        <div class="center colonne">
            <?php
            echo '<form action="index.php?page=ActionChangeMDP&mode='.$_GET['mode'].'" method="POST">';
            ?>
                <div class="colSpan2 center"><h1><?php echo texte('Changer de Mot de Passe') ?></h1></div>
                <label for="motDePasse"><?php echo texte('Mdp') ?> : </label> 
                <div class="relative">
                    <input type="password" id="motDePasse" name="motDePasse" pattern="^<?php echo $regex["pwd"] ?>$"
                        required>
                    <i class="oeil fas fa-eye"></i>
                    <fieldset id="infoMDP" class="noDisplay infoBulle">
                    <legend><?php echo texte('infoMdpLegend') ?></legend>
                        <div class="colonne gridAideMDP">
                            <i class="fas fa-times-circle fa-red"></i>
                            <label class="double" for=""><?php echo texte('uneMajuscule') ?></label>

                            <i class="fas fa-times-circle fa-red"></i>
                            <label class="double" for=""><?php echo texte('uneMinuscule') ?></label>

                            <i class="fas fa-times-circle fa-red"></i>
                            <label class="double" for=""><?php echo texte('UnChiffre') ?></label>

                            <i class="fas fa-times-circle fa-red"></i>
                            <label class="double" for=""><?php echo texte('UnCaractereSpecial') ?></label>
                            
                            <i class="fas fa-times-circle fa-red"></i>
                            <label class="double" for=""><?php echo texte('MinimumCaractere') ?></label>
                        </div>
                    </fieldset>
                </div>


                <label for="confirmPassword"><?php echo texte('Confirmation') ?> : </label>
                <div class="relative">
                    <input type="password" id="confirmPassword" name="confirmPassword"  required >
                    <i class="oeil fas fa-eye"></i>
                </div>

                <div></div>
                <div></div>

                <!-- <input type="reset" value="<?php echo texte('Reset') ?>"> -->
                <?php
                    echo'<a href="index.php?page=FormPlan_Utilisateurs&mode='.$_GET['mode'].'&id='.$_SESSION['utilisateur']->getIdUtilisateur().'"><button type="button"><i class="fas fa-sign-out-alt fa-rotate-180"></i></button></a>';
                ?>
                <input type="submit" value="<?php echo texte('Envoyer') ?>">
            </form>
        </div>
    <div class="demi"></div>
</main>