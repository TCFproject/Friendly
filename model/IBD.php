<?php
require_once ("IsetBDD.php");

interface IBD extends IsetBDD
{
    function newBD($idauteur);
    function getInfoBD();
    function getAuteursBD($idAuteur);
    function getGenresBD();
    function getCategorie();
    function getBDparGenre();
    function getListBD(int $id_cathe = null);
}
