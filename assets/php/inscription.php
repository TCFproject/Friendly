<?php
require_once ('model/auteur.php');
require_once('controller/ControlAuteur2.php');
require_once('model/DataBase.php');
require_once ('assets/php/Backend_connexion.php');

$nom = ($_POST['nom']);
$prenom = ($_POST['prenom']);
$email = ($_POST['email']);
$mdp = ($_POST['mdp']);
$pseudo = ($_POST['pseudo']);

$BDDConn = new DataBase();
$inscriptionAuteur = new auteur($nom, $prenom, $email, $mdp, $pseudo);
$controller = new ControlAuteur2($inscriptionAuteur, $BDDConn);
$backend_control = new Backend_connexion($controller);

var_dump($nom ." ". $prenom ." ". $email ." ". $mdp);
if (!$backend_control->inscription()){
    try{
        //mkdir("../../imageTempo/".$nom, 0755);
        header('Location:pageConnexion.php?codeResult=reussit');
    }
    catch (Exception $e){
        header('Location:pageConnexion.php?codeResult=echec');
    }
}
?>
