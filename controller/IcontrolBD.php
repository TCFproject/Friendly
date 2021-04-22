<?php


interface IcontrolBD
{
    public static function creerBD(int $idAuteur);
    public static function getInfosBD();
    public static function getLesGenresBD(int $id = null);
}
