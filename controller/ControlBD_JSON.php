<?php
require_once ('IcontrolBD.php');

class ControlBD_JSON implements IcontrolBD
{
    private static $bd;

    public function __construct(IBD $IBD, IDataBase $dataBase){
        self::$bd = $IBD;
        self::$bd->setBDD($dataBase);
    }

    public static function creerBD(int $idAuteur)
    {
        // TODO: Implement creerBD() method.
        return json_encode(self::$bd->newBD($idAuteur));
    }

    public static function getInfosBD()
    {
        // TODO: Implement getInfosBD() method.
        return json_encode( self::$bd->getInfoBD());
    }

    public static function getAuteurBD($id)
    {
        // TODO: Implement getLesGenresBD() method.
        return json_encode(self::$bd->getAuteursBD($id));
    }

    public static function getGenreBD()
    {
        // TODO: Implement getGenreBD() method.
        return json_encode(self::$bd->getGenresBD());
    }

    public static function getCategorieBD()
    {
        // TODO: Implement getCategorieBD() method.
    }

    public static function getListBD(int $id_genre = null)
    {
        // TODO: Implement getListBD() method.
    }
}
