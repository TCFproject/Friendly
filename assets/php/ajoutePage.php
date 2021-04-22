<?php
require_once ('../../controller/controlOeuvre2.php');
require_once ('assetsOeuvre.php');

$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$laPage = $_FILES['page']['tmp_name'];
$repot = isset($_GET['repot'])?$_GET['repot']:'';
$page = isset($_GET['page'])?$_GET['page']:'';
$repotDepot = "../../".$repot.'/'.$page;
$donnerNbPage = sizeof($assetsOeuvre->getPages('../../'.$repot,$page));
$noPage = $donnerNbPage+1;
if(getimagesize($laPage)){
    $_FILES['page']['name'] = 'page'.$noPage.'.jpg';

    move_uploaded_file($laPage, $repotDepot.'/'.$_FILES['page']['name']);
    header('Location:'.$_SERVER['HTTP_REFERER']);
}else{
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
?>
