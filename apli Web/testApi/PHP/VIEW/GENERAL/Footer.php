
</main>
<footer class="bigEspace"></footer>
<?php
 if (substr($page[1],0,4)=="Form"){
    echo ' <script src="./JS/VerifForm.js"></script>';
 }else if($page[1]=="Accueil"){
   echo ' <script src="./JS/ajax.js"></script>';
 }
 echo ' <script src="./JS/script.js"></script>';
echo '</body>
</html>';