<?php
require_once ('IcontrolBD.php');

class controlBD2 implements IcontrolBD
{
    private static $bd;

    public function __construct(IBD $IBD, IDataBase $dataBase){
        self::$bd = $IBD;
        self::$bd->setBDD($dataBase);
    }

    public static function creerBD(int $idAuteur)
    {
        // TODO: Implement creerBD() method.
        return self::$bd->newBD($idAuteur);
    }

    public static function getInfosBD()
    {
        // TODO: Implement getInfosBD() method.
        return self::$bd->getInfoBD();
    }

    public static function getLesGenresBD(int $id = null)
    {
        // TODO: Implement getLesGenresBD() method.
        return self::$bd->getGenresBD($id);
    }
}
