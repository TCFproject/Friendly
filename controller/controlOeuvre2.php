<?php
require_once ('IcontrolOeuvre.php');

class controlOeuvre2 implements IcontrolOeuvre
{
    private static $slice = 2;
    private static $repertoir = "imageTempo/";
    public static function getTitres(string $autre = null)
    {
        // TODO: Implement getTitres() method.
        if ($autre != null){
            return self::fromChemin(self::$repertoir.$autre);
        }else{
            $list_titre = array();
            foreach (self::fromChemin(self::$repertoir) as $nomAuteur){
                foreach (self::fromChemin(self::$repertoir.$nomAuteur) as $titre)
                array_push($list_titre,$titre);
            }
            return $list_titre;
        }
    }

    public static function getRacineChemin()
    {
        // TODO: Implement getChemin() method
        return self::$repertoir;
    }
    private static function fromChemin(string $chemin){
        return array_slice(scandir($chemin), self::$slice);
    }
    public static function getAuteur()
    {
        // TODO: Implement getAuteur() method.
        return array_slice(scandir(self::$repertoir), self::$slice);
    }

    public static function getPage(string $chemin, string $chapitre)
    {
        // TODO: Implement getPage() method.
        $list_pages = array();
        $link = $chemin.'/'.$chapitre;
        foreach (self::fromChemin($link) as $pages){
            array_push($list_pages, $link.'/'.$pages);
        }
        return $list_pages;
    }

    public static function getNomChapitre(string $chemin)
    {
        // TODO: Implement getNomChapitre() method.
        $list_chapitre = array();
        foreach (self::fromChemin($chemin) as $dire){
            if (is_dir( $chemin.'/'.$dire)){
                array_push($list_chapitre, $dire);
            }
        }
        return $list_chapitre;
    }

    public static function getCouverture(string $chemin)
    {
        // TODO: Implement getCouverture() method.
        $list_couverture = array();
        foreach (self::fromChemin($chemin) as $dire){
            if (!is_dir( $chemin.'/'.$dire)){
                array_push($list_couverture,$chemin.'/'.$dire);
            }
        }
        return $list_couverture;
    }

    public static function getRepotString()
    {
        $list_repot = array();
        // TODO: Implement getRepot() method.
        foreach (self::getAuteur() as $nomAuteur){
            $lesBDS = array_slice(scandir(self::$repertoir.$nomAuteur), self::$slice);
            foreach ($lesBDS as $uneBD){
                array_push($list_repot, self::$repertoir.$nomAuteur.'/'.$uneBD);
            }
        }
        return $list_repot;
    }
}
?>
