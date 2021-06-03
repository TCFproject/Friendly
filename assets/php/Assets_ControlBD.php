<?php

class Assets_ControlBD
{
    private $controlBD;

    public function __construct(IcontrolBD $icontrolBD)
    {
        $this->controlBD = $icontrolBD;
    }

    public function getAuteurBD($id){
        return $this->controlBD::getAuteurBD($id);
    }

    public function getInfo(){
        return $this->controlBD::getInfosBD();
    }

    public function getLesGenresBD(){
        return $this->controlBD::getGenreBD();
    }

    public function getLesCategoriesBD(){
        return $this->controlBD::getCategorieBD();
    }

    public function getBDparCathe(){
        return $this->controlBD::getBDparCate();
    }

    public function getListsBD(int $id_genre = null){
        return $this->controlBD::getListBD($id_genre);
    }
}
?>
