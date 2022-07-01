<?php
require_once ('model/DataBase.php');
require_once ('model/BD.php');
require_once ('controller/controlBD2.php');
require_once ('model/auteur.php');
require_once ('controller/ControlAuteur2.php');
require_once ('assets/php/Backend_connexion.php');
require_once ('assets/php/Backend_creationBD.php');

var_dump($_POST);
$nom_Image = $_FILES['couverture']['name'];
$Image_Extension = strrchr($nom_Image, ".");
$extension_autorise = array('.jpg', '.jpeg', '.png', '.JPG', '.JEPG', '.PNG');

$BDDConn = new DataBase();

$donneInfo = new BD("","","",array(),"");
$controllerBD = new controlBD2($donneInfo,$BDDConn);
$backendThis = new Backend_creationBD($controllerBD);

$genreListe = $backendThis->getLesGenresBD();

$genres = array();
foreach ($genreListe as $value){
    if (isset($_POST[$value['libelle']])?$_POST[$value['libelle']]:'' != ''){
        $genres[$value['libelle']] = isset($_POST[$value['libelle']])?$_POST[$value['libelle']]:'';
    }
}
var_dump($genres);

$titre = isset($_POST['titre'])?$_POST['titre']:'';
$replaceTitre = str_replace(" ","_",$titre);
var_dump($replaceTitre);
$catheg = isset($_POST['cathegorie'])?$_POST['cathegorie']:'';
$descr = isset($_POST['description'])?$_POST['description']:'';
/********************************************************************************************/

$auteurAchercher = new auteur($_SESSION['nom'],"","","","");
$controller = new ControlAuteur2($auteurAchercher,$BDDConn);
$backend = new Backend_connexion($controller);
$id = $backend->getLesInfos();
var_dump($id['id']);

$chemin = 'imageTempo/'.$_POST['titre'];
$newBD = new BD($replaceTitre, $_POST['description'],$_POST['cathegorie'], $genres,$chemin);
$controller = new controlBD2($newBD,$BDDConn);
$assets = new Backend_creationBD($controller);
$assets->creerUneBD($id['id']);
mkdir($chemin);
if (!empty($_FILES)){
    if (in_array($Image_Extension, $extension_autorise)){
        $_FILES['couverture']['name'] = 'couverture.jpg';
        move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin.'/'.$_FILES['couverture']['name']);
    }
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>
