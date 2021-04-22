<?php
require_once ("Iauteur.php");

class auteur implements Iauteur {
    private $Nom;
    private $Prenom;
    private $Email;
    private $Mdp;
    private $Pseudo;
    private $BDD;

    public function __construct($nom, $prenom, $email, $mdp, $pseudo){
        $this->Nom = $nom;
        $this->Prenom = $prenom;
        $this->Email = $email;
        $this->Mdp = $mdp;
        $this->Pseudo = $pseudo;
    }

    public function inscrire(){
        $inscri = 'INSERT INTO auteur(nom, prenom, email, mdp, pseudo) VALUE (:nom,:prenom,:email,:mdp,:pseudo)';
        $SQLStmt = $this->BDD->getBDDConn()->prepare($inscri);
        $SQLStmt->bindValue(':nom', $this->Nom);
        $SQLStmt->bindValue(':prenom', $this->Prenom);
        $SQLStmt->bindValue(':email', $this->Email);
        $SQLStmt->bindValue(':mdp', $this->Mdp);
        $SQLStmt->bindValue(':pseudo', $this->Pseudo);
        $SQLStmt->execute();
    }

    function getInfoAuteur()
    {
        $lesInfos = array(
            "nom" => $this->Nom,
            "prenom" => $this->Prenom,
            "email" => $this->Email,
            "mdp" => $this->Mdp,
            "pseudo" => $this->Pseudo
        );
        // TODO: Implement getInfoAuteur() method.
        $list_key = array();
        $getInfoAuteur = 'SELECT * FROM auteur WHERE ';
        foreach ($lesInfos as $laBalise => $laValeur){
            if ($laValeur != ""){
                $list_key[$laBalise] = $laValeur;
            }
        }
        $getInfoAuteur.= array_keys($list_key)[0]." = :".array_keys($list_key)[0];

        if(sizeof($lesInfos) > 1){
            for($i = 1; $i<sizeof($list_key); $i++){
                $getInfoAuteur.= " AND ".array_keys($list_key)[$i]." = :".array_keys($list_key)[$i];
            }
        }

        $SQLStmt = $this->BDD->getBDDConn()->prepare($getInfoAuteur);
        foreach($list_key as $laBalise => $laValeur){
            $SQLStmt->bindValue(':'.$laBalise, $laValeur);
        }
        $SQLStmt->execute();
        return $SQLStmt->fetch(PDO::FETCH_ASSOC);
    }

    function setBDD(IDataBase $dataBase)
    {
        // TODO: Implement setBDD() method.
        $this->BDD = $dataBase;
    }
}
?>
