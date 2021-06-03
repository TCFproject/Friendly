<?php
require_once ('IcontrolOeuvre.php');

class ControlOeuvre3 implements IcontrolOeuvre
{
    private static $Oeuvre;
    public function __construct(IOeuvre $oeuvre)
    {
        self::$Oeuvre = $oeuvre;
    }

    public static function getTitres(string $autre = null)
    {
        // TODO: Implement getTitres() method.
    }

    public static function getRacineChemin()
    {
        // TODO: Implement getRacineChemin() method.
    }

    public static function getAuteur()
    {
        // TODO: Implement getAuteur() method.
    }

    public static function getPage(string $chemin, string $chapitre)
    {
        // TODO: Implement getPage() method.
    }

    public static function getNomChapitre(string $chemin)
    {
        // TODO: Implement getNomChapitre() method.
    }

    public static function getCouverture(string $chemin)
    {
        // TODO: Implement getCouverture() method.
    }

    public static function getRepotString()
    {
        // TODO: Implement getRepotString() method.
    }
}
