<?php
require_once ('model/DataBase.php');
require_once ('controller/ControlAuteur2.php');
require_once ('model/auteur.php');
require_once ('assets/php/Backend_connexion.php');

$BDD = new DataBase();
$email = $_POST['conne_email'];
$mdp = $_POST['conne_mdp'];

$auteurARechercher = new auteur("","", $email, $mdp,"");
$Controller = new ControlAuteur2($auteurARechercher, $BDD);
$backend = new Backend_connexion($Controller);

$SQLResult = $backend->getLesInfos();
if($SQLResult == false){
    header("Location:pageConnexion.php?Error=error");
}else{
    session_start();
    $_SESSION['nom'] = $SQLResult['nom'];
    $_SESSION['prenom'] = $SQLResult['prenom'];
    header("Location:index.php");
}
?>
