<?php

namespace Entite;

use Media ;

class Magazine extends Media
{
    protected int $numeroMagazine;
    protected \DateTime $datePublication;

    public function __construct(int $numeroMagazine,string $titre,string $datePublication)
    {
        $dureeEmprunt = 10;
        parent::__construct($titre,$dureeEmprunt);
        $this->numeroMagazine = $numeroMagazine;
        $this->datePublication = \DateTime::createFromFormat("d/m/Y",$datePublication);
    }

    public function getInformationsMedia() : string
    {
        return "numero du magazine : {$this->numeroMagazine}".PHP_EOL."
                Titre : {$this->titre}".PHP_EOL."
                Date publication : {$this->datePublication->format("d/m/Y")}".PHP_EOL."
        ";
    }
}