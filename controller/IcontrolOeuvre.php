<?php
interface IcontrolOeuvre{
    public static function getTitres(string $autre = null);
    public static function getRacineChemin();
    public static function getAuteur();
    public static function getPage(string $chemin, string $chapitre);
    public static function getNomChapitre(string $chemin);
    public static function getCouverture(string $chemin);
    public static function getRepotString();
}
?>
