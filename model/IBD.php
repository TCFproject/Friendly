<?php
require_once ("IsetBDD.php");

interface IBD extends IsetBDD
{
    function newBD($idauteur);
    function getInfoBD();
    function getGenresBD(int $id = null);
}
