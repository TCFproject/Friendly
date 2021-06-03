<?php


class Assets_Oeuvre
{
    private $controleOeuvre;
    public function __construct(IcontrolOeuvre $ControleOeuvre)
    {
        $this->controleOeuvre = $ControleOeuvre;
    }

    public function getAuteurs(){
        return json_encode($this->controleOeuvre::getAuteur());
    }

    public function getTitre(string $auteur = null){
        if ($auteur == null || $auteur == ""){
            return json_encode( $this->controleOeuvre::getTitres());
        }else{
            return json_encode( $this->controleOeuvre::getTitres($auteur));
        }
    }

    public function getChemins(string ...$infos){
        $chemin = '';
        if (sizeof($infos) == 0){
            return json_encode( $this->controleOeuvre::getRacineChemin());
        }else if (sizeof($infos) == 1){
            return json_encode($this->controleOeuvre::getRacineChemin().$infos[0]);
        }else{
            $chemin.= $infos[0];
            for($i = 1; $i<sizeof($infos); $i++){
                $chemin.= '/'.$infos[$i];
            }
        }
        return json_encode($this->controleOeuvre::getRacineChemin().$chemin);
    }

    public function getRepot(){
        return json_encode($this->controleOeuvre::getRepotString());
    }

    public function getCouvertures(string $chemin){
        return json_encode($this->controleOeuvre::getCouverture($chemin));
    }

    public function getPages(string $chemin, string $chapitre){
        return json_encode($this->controleOeuvre::getPage($chemin, $chapitre));
    }
    public function getChapitre(string $chemin){
        return json_encode($this->controleOeuvre::getNomChapitre($chemin));
    }

    public function getLesOeuvresAuteur(string $nom){
        return json_encode($this->controleOeuvre::getTitres($nom));
    }
}
