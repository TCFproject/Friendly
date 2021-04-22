<?php
require_once ('../../controller/controlOeuvre2.php');
require_once ('assetsOeuvre.php');

$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$nomChapitre = isset($_POST['nomChapitre'])?$_POST['nomChapitre']:'';
$nouveauChapitre = str_replace( " ","_", $nomChapitre);
$route = isset($_GET['repotPage'])?$_GET['repotPage']:'';
//var_dump($route);
$Chapitre = $assetsOeuvre->getChapitre('../../'.$route);
//var_dump($Chapitre);
$ajoutChapitre = sizeof($Chapitre)+1;
//var_dump($ajoutChapitre);
if ($nomChapitre != '' || $nomChapitre != null){
    mkdir('../../'.$route.'/chapitre_'.$ajoutChapitre.';'.$nouveauChapitre, 0777);
}
header('Location:'.$_SERVER['HTTP_REFERER']);
?>
