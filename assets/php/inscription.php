<?php
require_once ('../../model/auteur.php');
require_once('../../controller/ControlAuteur2.php');
require_once('../../model/DataBase.php');
require_once ('Backend_connexion.php');

$nom = (isset($_POST['nom'])?$_POST['nom']:'');
$prenom = (isset($_POST['prenom'])?$_POST['prenom']:'');
$email = (isset($_POST['email'])?$_POST['email']:'');
$mdp = (isset($_POST['mdp'])?$_POST['mdp']:'');
$pseudo = (isset($_POST['pseudo'])?$_POST['pseudo']:'');

$BDDConn = new DataBase();
$inscriptionAuteur = new auteur($nom, $prenom, $email, $mdp, $pseudo);
$controller = new ControlAuteur2($inscriptionAuteur, $BDDConn);
$backend_control = new Backend_connexion($controller);

var_dump($nom ." ". $prenom ." ". $email ." ". $mdp);
if (!$backend_control->inscription()){
    try{
        mkdir("../../imageTempo/".$nom, 0755);
        header('Location:../../pageConnexion.php?codeError=reussit');
    }
    catch (Exception $e){
        header('Location:../../pageConnexion.php?codeError=echec');
    }
}
?>
