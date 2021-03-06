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

    public static function getAuteurBD($id)
    {
        // TODO: Implement getLesGenresBD() method.
        return self::$bd->getAuteursBD($id);
    }

    public static function getGenreBD()
    {
        // TODO: Implement getGenreBD() method.
        return self::$bd->getGenresBD();
    }

    public static function getCategorieBD()
    {
        // TODO: Implement getCategorieBD() method.
        return self::$bd->getCategorie();
    }

    public static function getBDparCate()
    {
        // TODO: Implement getBDparCate() method.
        return self::$bd->getBDparGenre();
    }

    public static function getListBD(int $id_genre = null)
    {
        // TODO: Implement getListBD() method.
        return self::$bd->getListBD($id_genre);
    }
}
