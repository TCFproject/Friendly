<?php

class Assets_ControlBD
{
    private $controlBD;

    public function __construct(IcontrolBD $icontrolBD)
    {
        $this->controlBD = $icontrolBD;
    }

    public function getLesGenresBD(int $id = null){
        return $this->controlBD::getLesGenresBD($id);
    }

    public function getInfo(){
        return $this->controlBD::getInfosBD();
    }
}
?>
