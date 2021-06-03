<?php


interface IcontrolBD
{
    public static function creerBD(int $idAuteur);
    public static function getInfosBD();
    public static function getAuteurBD($id);
    public static function getGenreBD();
    public static function getCategorieBD();
    public static function getListBD(int $id_genre = null);
}
