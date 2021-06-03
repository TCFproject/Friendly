<?php
require_once ('IOeuvre.php');

class Oeuvre implements IOeuvre
{
    private $chemin;
    private $racine = 'imageTempo/';

    public function __construct(string $auteur, string $titre, string $chapitre)
    {
        $this->chemin = $this->racine.$auteur.'/'.$titre.'/'.$chapitre;
    }

    public function getItemFile()
    {
        // TODO: Implement getItemFile() method.
        return array_slice(scandir($this->chemin),2);
    }
}
