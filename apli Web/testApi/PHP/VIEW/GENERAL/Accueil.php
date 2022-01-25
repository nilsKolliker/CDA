<?php
    echo "<div class=\"bigEspace\"></div>";
    echo "<div>";
    echo "  <div></div>";

    echo '<div class="colonne">';
    echo '<div>';
    echo '<div class="colonne">';
    echo   '<input id="laDate" type=date>';
    echo   '<select id="listeStation" disabled>';      
    echo   '</select>';
    // echo '  <div></div>';
    echo '</div>';
    echo '<iframe id="maps" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>';
    echo '</div>';

    echo "<div class=\"bigEspace\"></div>";
    echo "  <div id=\"ajaxIci\" class=\"grilleApi\">";
    echo "    <div class=\"center\">Heure de la meusure</div>";
    echo "    <div class=\"center\">Temperature de l'eau en C°</div>";
    
    echo "    <div class=\"espace\"></div>";
    echo "    <div class=\"espace\"></div>";
    echo "  </div>";
    echo "  </div>";
    echo "  <div></div>";
    echo "</div>";
    echo "<div class=\"bigEspace\"></div>";
    echo "<template id=\"template\">";
    echo "  <div class=\"heure center\"></div>";
    echo "  <div class=\"temps center\"></div>";
    echo "</template>";