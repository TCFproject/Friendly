<?php
require_once ("IsetBDD.php");

interface Iauteur extends IsetBDD
{
    function inscrire();
    function getInfoAuteur();
}
