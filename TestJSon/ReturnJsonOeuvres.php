<?php
require_once ('../controller/controlOeuvre2.php');
require_once ('../assets/php/Assets_Oeuvre.php');

$assetsOeuvre = new Assets_Oeuvre(new controlOeuvre2());

echo ($assetsOeuvre->getAuteurs());
?>
