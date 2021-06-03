<?php
require_once ("IBD.php");

class BD implements IBD {
    private $Titre;
    private $Descri;
    private $id_Cathe;
    private $genres;
    private $Date_public;
    private $BDDConn;

    public function __construct($titre, $descri, $id_cathe, array $genres, $date_public){
        $this->Titre = $titre;
        $this->Descri = $descri;
        $this->id_Cathe = $id_cathe;
        $this->genres = $genres;
        $this->Date_public = $date_public;
    }

    public function newBD($idauteur){
        // TODO: Implement newBD() method.
        $uneNouvelleBD = 'INSERT INTO BD(id_auteur,titre,description,id_cathe, date_public) VALUE (:auteur,:titre,:descrip,:cathe,:date_public)';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($uneNouvelleBD);
        $SQLStmt->bindValue(':auteur',$idauteur);
        $SQLStmt->bindValue(':titre',$this->Titre);
        $SQLStmt->bindValue(':descrip',$this->Descri);
        $SQLStmt->bindValue(':cathe',$this->id_Cathe);
        $SQLStmt->bindValue(':date_public',$this->Date_public);
        $SQLStmt->execute();

        $SQLStmt = $this->BDDConn->getBDDConn()->prepare('SELECT id FROM BD WHERE titre = :titre');
        $SQLStmt->bindValue(':titre', $this->Titre);
        $SQLStmt->execute();
        $id_titre = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $test = array();
        foreach($this->genres as $genr){
            if($genr != ''){
                $SQLStmt = $this->BDDConn->getBDDConn()->prepare('INSERT INTO toutGenre(id_Genre, id_BD) VALUES (:genre,:BD)');
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
        $list_genre = array();
        $list_in_BD = array();
        $infoGlobalBD = 'SELECT BD.*, auteur.nom, auteur.prenom FROM BD INNER JOIN cathegorie ON id_cathe = cathegorie.id INNER JOIN auteur ON BD.id_auteur = auteur.id WHERE titre = :titre';
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

    function getAuteursBD($idAuteur)
    {
        // TODO: Implement getAuteursBD() method.
        $REQUEST = 'SELECT titre FROM BD ';
        $REQUEST.= 'INNER JOIN auteur ON id_auteur = auteur.id ';
        $REQUEST.= 'WHERE auteur.id = :id_auteur';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($REQUEST);
        $SQLStmt->bindValue(":id_auteur", $idAuteur);
        $SQLStmt->execute();
        return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGenresBD()
    {
        // TODO: Implement getGenresBD() method.
        $REQUEST = 'SELECT * FROM genre';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($REQUEST);
        $SQLStmt->execute();
        return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function setBDD(IDataBase $dataBase)
    {
        // TODO: Implement setBDD() method.
        $this->BDDConn = $dataBase;
    }

    function getCategorie()
    {
        // TODO: Implement getCategorie() method.
        $REQUEST = 'SELECT * FROM cathegorie';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($REQUEST);
        $SQLStmt->execute();
        return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getBDparGenre()
    {
        // TODO: Implement getBDparGenre() method.
        $REQUEST = 'SELECT * FROM BD WHERE id_cathe = :idCate';
        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($REQUEST);
        $SQLStmt->bindValue(':idCate', $this->id_Cathe);
        $SQLStmt->execute();
        return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getListBD(int $id_cathe = null)
    {
        $listBD = array();
        // TODO: Implement getListBD() method.
        $listInfo = array(
            "titre" => $this->Titre,
            "id_cathe" => $this->id_Cathe,
            "date_public" => $this->Date_public
        );
        foreach ($listInfo as $data => $key){
            if ($key != '' || $key != null || $key != 0){
                $listBD[$data] = $key;
            }
        }
        $REQUEST = 'SELECT titre FROM BD';

        if ($id_cathe != null){
            $REQUEST.= ' INNER JOIN toutgenre ON toutgenre.id_BD = BD.id INNER JOIN genre ON genre.id = toutgenre.id_Genre';
        }

        if (sizeof($listBD) == 1){
            $REQUEST.= " WHERE ".array_keys($listBD)[0]." = :". array_keys($listBD)[0];
        }elseif (sizeof($listBD) > 1){
            $REQUEST.= " WHERE ".array_keys($listBD)[0]." = :". array_keys($listBD)[0];
            for($i = 1; $i<sizeof($listBD); $i++){
                $REQUEST.= ' AND '.array_keys($listBD)[$i]." = :".array_keys($listBD)[$i];
            }
        }

        if ($id_cathe != null){
            if (sizeof($listBD) == 0){
                $REQUEST.= ' WHERE toutgenre.id_Genre = '.$id_cathe;
            }else{
                $REQUEST.= ' AND toutgenre.id_Genre = '.$id_cathe;
            }
        }

        $SQLStmt = $this->BDDConn->getBDDConn()->prepare($REQUEST);
        foreach ($listBD as $data => $key){
            $SQLStmt->bindValue(':'.$data,$key);
        }
        $SQLStmt->execute();

        return $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
