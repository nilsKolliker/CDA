<?php
    if (!isset($_GET["Nom"])) {
        $_GET["Nom"]="L'HOGNEAU À GUSSIGNIES (59)";
    }
    if (!isset($_GET["Date"])) {
        $_GET["Date"]="2008-07-01";
    }
    echo "<div class=\"center\"><h3>Temperature de l'eau de ".$_GET["Nom"]." le ".$_GET["Date"]."</h3></div>";
    echo "<div>";
    echo "  <div></div>";
    echo "  <div id=\"ajaxIci\" class=\"grilleApi\" data-nom=\"".$_GET["Nom"]."\" data-date=\"".$_GET["Date"]."\" >";
    echo "    <div class=\"center\">Heure de la meusure</div>";
    echo "    <div class=\"center\">Temperature de l'eau en C°</div>";
    
    echo "    <div class=\"espace\"></div>";
    echo "    <div class=\"espace\"></div>";
    echo "  </div>";
    echo "  <div></div>";
    echo "</div>";
    echo "<div class=\"bigEspace\">></div>";
    echo "<template id=\"template\">";
    echo "  <div class=\"heure center\"></div>";
    echo "  <div class=\"temps center\"></div>";
    echo "</template>";