<?php
session_start();
require_once ('../../model/DataBase.php');
require_once ('../../model/BD.php');
require_once ('../../controller/controlBD2.php');
require_once ('../../model/auteur.php');
require_once ('../../controller/ControlAuteur2.php');
require_once ('Backend_connexion.php');
require_once ('Backend_creationBD.php');
var_dump($_FILES);
$nom_Image = $_FILES['couverture']['name'];
$Image_Extension = strrchr($nom_Image, ".");
$extension_autorise = array('.jpg', '.jpeg', '.png', '.JPG', '.JEPG', '.PNG');

$BDDConn = new DataBase();

$donneInfo = new BD("","","",array());
$controllerBD = new controlBD2($donneInfo,$BDDConn);
$backendThis = new Backend_creationBD($controllerBD);

$genreListe = $backendThis->getLesGenresBD();

$genres = array();
foreach ($genreListe as $value){
    $genres[$value['libelle']] = isset($_POST[$value['libelle']])?$_POST[$value['libelle']]:'';
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

try{
    $BDDConn = new DataBase();
    $auteurAchercher = new auteur($_SESSION['nom'],"","","","");
    $controller = new ControlAuteur2($auteurAchercher,$BDDConn);
    $backend = new Backend_connexion($controller);
    $id = $backend->getLesInfos();

    try{
        $nouvelleBD = new BD($replaceTitre,$descr,$catheg,$genres);
        $controllerBD = new controlBD2($nouvelleBD,$BDDConn);
        $backendThis = new Backend_creationBD($controllerBD);
        var_dump(intval( $id['id']));

        $link = '../../imageTempo/'.$_SESSION['nom'];

        $backendThis->creerUneBD(intval($id['id']));
        mkdir($link.'/'.$replaceTitre);
        if (!empty($_FILES)){
            if (in_array($Image_Extension, $extension_autorise)){
                $chemin_couverture = $link.'/'.$replaceTitre.'/'.$_FILES['couverture']['name'];
                move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin_couverture);
            }
        }
        header('Location:../../listeDeTesOeuvres.php');
    }
    catch(Exception $e){
        var_dump($e);
    }
}
catch(Exception $e){
    var_dump($e);
}
?>
