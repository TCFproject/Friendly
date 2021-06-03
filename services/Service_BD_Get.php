<?php


class Service_BD_Get
{
    private $controlBD;
    public function __construct(IcontrolBD $icontrolBD)
    {
        $this->controlBD = $icontrolBD;
    }

    public function getLesGenresBD(){
        return $this->controlBD::getGenreBD();
    }

    public function getLesCategoriesBD(){
        return $this->controlBD::getCategorieBD();
    }}
