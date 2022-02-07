
<footer>
   <div class="center">
      <span class="colonne">
         <div class="titre center">Services et Garanties</div>
         <div class="center">Graranties et assurances</div>
         <div class="center">Mon espace Client</div>
         <div class="center">Nos magasins</div>
      </span>
   </div>
   <div class="center">
      <span class="colonne">
         <div class="titre center">Mivraison et paiement</div>
         <div class="center">Les mods et frais de livraison</div>
         <div class="center">Livraison en europe</div>
         <div class="center">Livraison à l'international</div>
      </span>
   </div>
   <div class="center">
      <span class="colonne">
         <div class="titre center">Contactez nous</div>
         <div class="center">Contact Service Client</div>
         <div class="center">Contact publicité</div>
         <div class="center">Recrutement</div>
      </span>
   </div>

</footer>
<?php
 if (substr($page[1],0,4)=="Form"){
    echo ' <script src="./JS/VerifForm.js"></script>';
 }
 echo ' <script src="./JS/script.js"></script>';
echo '</body>
</html>';