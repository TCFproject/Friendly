<?php
require_once ("IBD.php");

class BD implements IBD {
    private $Titre;
    private $Descri;
    private $id_Cathe;
    private $genres;
    private $BDDConn;

    public function __construct($titre, $descri, $id_cathe, array $genres){
        $this->Titre = $titre;
        $this->Descri = $descri;
        $this->id_Cathe = $id_cathe;
        $this->genres = $genres;
    }

    public function newBD($idauteur){
        // TODO: Implement newBD() method.
        $uneNouvelleBD = 'INSERT INTO BD(id_auteur,titre,description,id_cathe) VALUE (:auteur,:titre,:descrip,:cathe)';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($uneNouvelleBD);
        $SQLStmt->bindValue(':auteur',$idauteur);
        $SQLStmt->bindValue(':titre',$this->Titre);
        $SQLStmt->bindValue(':descrip',$this->Descri);
        $SQLStmt->bindValue(':cathe',$this->id_Cathe);
        $SQLStmt->execute();

        $SQLStmt = $this->BDDConn->getBDDConn()->prepare('SELECT id FROM BD WHERE titre = :titre');
        $SQLStmt->bindValue(':titre', $this->Titre);
        $SQLStmt->execute();
        $id_titre = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $test = array();
        foreach($this->genres as $genr){
            if($genr != ''){
                $SQLStmt = self::$BDD->getBDDConn()->prepare('INSERT INTO toutGenre(id_Genre, id_BD) VALUES (:genre,:BD)');
                $SQLStmt->bindValue(':genre', $genr);
                $SQLStmt->bindValue(':BD', $id_titre['id']);
                $SQLStmt->execute();
                array_push($test, $genr.' '.$id_titre['id']);
            }
        }
        return $test;
    }

    function getInfoBD()
    {
        // TODO: Implement getInfoBD() method.
        $list_in_BD = array();
        $list_genre = array();
        $infoGlobalBD = 'SELECT * FROM BD WHERE titre = :titre';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($infoGlobalBD);
        $SQLStmt->bindValue(':titre', $this->Titre);
        $SQLStmt->execute();
        $BD = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $list_in_BD['BD'] = $BD;
        $RequeteGenrelBD = 'SELECT libelle FROM genre INNER JOIN toutgenre ON toutgenre.id_Genre = genre.id WHERE toutgenre.id_BD = '.$BD['id'];
        $SQLStmt2 = $this->BDDConn->getBDDConn()->query($RequeteGenrelBD);
        while($SQLgenres = $SQLStmt2->fetch(PDO::FETCH_ASSOC)){
            array_push($list_genre,$SQLgenres['libelle']);
        }
        $list_in_BD['genre'] = $list_genre;
        $catheBD = 'SELECT libelle FROM cathegorie WHERE cathegorie.id = '.$BD['id_cathe'];
        $SQLStmt3 = $this->BDDConn->getBDDConn()->query($catheBD);
        $libelleCathe = $SQLStmt3->fetch(PDO::FETCH_ASSOC);
        $list_in_BD['cathe'] = $libelleCathe['libelle'];

        return $list_in_BD;
    }

    function getGenresBD(int $id = null)
    {
        // TODO: Implement getGenreBD() method.
        if ($id == null){
            $SQLStmt = $this->BDDConn->getBDDConn()->query('SELECT * FROM genre');
            return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $infoGlobalBD = 'SELECT libelle FROM genre INNER JOIN toutgenre ON toutgenre.id_Genre = genre.id WHERE toutgenre.id_BD = '.$id;
        $SQLStmt = $this->BDDConn->getBDDConn()->query($infoGlobalBD);
        return $SQLStmt->fetch(PDO::FETCH_ASSOC);
    }

    function setBDD(IDataBase $dataBase)
    {
        // TODO: Implement setBDD() method.
        $this->BDDConn = $dataBase;
    }
}
?>
