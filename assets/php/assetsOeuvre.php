<?php
class assetsOeuvre
{
    private $controleOeuvre;

    public function __construct(IcontrolOeuvre $ControleOeuvre)
    {
        $this->controleOeuvre = $ControleOeuvre;
    }

    public function getAuteurs(){
        return $this->controleOeuvre::getAuteur();
    }

    public function getTitre(string ...$auteur){
        if (sizeof($auteur) == 0){
            return $this->controleOeuvre::getTitres();
        }else{
            return $this->controleOeuvre::getTitres($auteur[0]);
        }
    }

    public function getChemins(string ...$infos){
        $chemin = '';
        if (sizeof($infos) == 0){
            return $this->controleOeuvre::getRacineChemin();
        }else if (sizeof($infos) == 1){
            return $this->controleOeuvre::getRacineChemin().$infos[0];
        }else{
            $chemin.= $infos[0];
            for($i = 1; $i<sizeof($infos); $i++){
                $chemin.= '/'.$infos[$i];
            }
        }
        return $this->controleOeuvre::getRacineChemin().$chemin;
    }

    public function getRepot(){
       return $this->controleOeuvre::getRepotString();
    }

    public function getCouvertures(string $chemin){
        return $this->controleOeuvre::getCouverture($chemin);
    }

    public function getPages(string $chemin, string $chapitre){
        return $this->controleOeuvre::getPage($chemin, $chapitre);
    }
    public function getChapitre(string $chemin){
        return $this->controleOeuvre::getNomChapitre($chemin);
    }

    public function getLesOeuvresAuteur(string $nom){
        return $this->controleOeuvre::getTitres($nom);
    }
}

