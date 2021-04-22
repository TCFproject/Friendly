<?php
require_once ("IcontrolAuteur.php");

class ControlAuteur2 implements IcontrolAuteur
{
    private static $Iauteur;

    public function __construct(Iauteur $iauteur, IDataBase $bdd)
    {
        self::$Iauteur = $iauteur;
        self::$Iauteur->setBDD($bdd);
    }

    public static function inscription()
    {
        // TODO: Implement inscription() method.
        self::$Iauteur->inscrire();
    }

    public static function getLesInfos()
    {
        // TODO: Implement getLesInfos() method.
        return self::$Iauteur->getInfoAuteur();
    }
}
