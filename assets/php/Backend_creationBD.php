<?php


class Backend_creationBD
{
    private $controlBD;

    public function __construct(IcontrolBD $icontrolBD)
    {
        $this->controlBD = $icontrolBD;
    }

    public function getLesGenresBD(int $id = null){
        return $this->controlBD::getGenreBD($id);
    }
    public function getInfosBD(){
        return $this->controlBD::getInfosBD();
    }

    public function creerUneBD(int $id){
        return $this->controlBD::creerBD($id);
    }
}
