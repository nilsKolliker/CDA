<?php
// $_POST[0]=1;
// if(isset($_POST)&&$_POST){
    $string="{";
    foreach ($_POST as $key => $value) {
        $string.=$key.":".$value.",";
    }
    $string.="}";
// }else{
    // $string="vide";
// }
echo $string;
