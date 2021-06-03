<?php
require_once ('../../controller/controlOeuvre2.php');
require_once ('assetsOeuvre.php');

$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$lesCHapitres = array();
$lesCHapitres[$_POST['numeroChapitre1']] = str_replace( " ","_", $_POST['nomChapitre1']);
$lesCHapitres[$_POST['numeroChapitre2']] = str_replace( " ","_", $_POST['nomChapitre2']);
$lesCHapitres[$_POST['numeroChapitre3']] = str_replace( " ","_", $_POST['nomChapitre3']);
$lesCHapitres[$_POST['numeroChapitre4']] = str_replace( " ","_", $_POST['nomChapitre4']);
$lesCHapitres[$_POST['numeroChapitre5']] = str_replace( " ","_", $_POST['nomChapitre5']);
$route = isset($_GET['repotPage'])?$_GET['repotPage']:'';
$Chapitre = $assetsOeuvre->getChapitre('../../'.$route);

foreach ($lesCHapitres as $CHapitre => $num){
    if ($num != '' || $num != null){
        mkdir('../../'.$route.'/chapitre_'.strval($CHapitre).';'.$num, 0777);
    }
}
header('Location:'.$_SERVER['HTTP_REFERER']);
?>
