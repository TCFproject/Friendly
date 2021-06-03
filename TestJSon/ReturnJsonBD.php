<?php
require_once ('../model/DataBase.php');

require_once ('../model/BD.php');
require_once ('../controller/ControlBD_JSON.php');
require_once ('../assets/php/Assets_ControlBD.php');

$titre = isset($_GET['titre'])?$_GET['titre']:'';

$database = new DataBase();

$rechercheBD = new BD($titre,"","", array(), null);
$controler = new ControlBD_JSON($rechercheBD,$database);
$assets = new Assets_ControlBD($controler);

echo ($assets->getInfo());
?>
