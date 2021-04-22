<?php


class Backend_connexion
{
    private $IcontrolAuteur;

    public function __construct(IcontrolAuteur $icontrolAuteur) {
        $this->IcontrolAuteur = $icontrolAuteur;
    }

    public function inscription() {
        $this->IcontrolAuteur::inscription();
    }

    public function getLesInfos() {
        return $this->IcontrolAuteur::getLesInfos();
    }
}
?>
