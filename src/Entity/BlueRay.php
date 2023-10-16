<?php

namespace Entite ;

use Media ;

class BlueRay extends Media
{
    protected string $realisateur;
    protected float $duree;
    protected string $anneeSortie;

    public function __construct(string $titre,string $realisateur,float $duree,string $anneeSortie )
    {
        $dureeEmprunt = 15;
        parent::__construct($titre, $dureeEmprunt);
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;

    }


    public function getInformationsMedia() : string
    {
        return "Réalisateur : {$this->realisateur}".PHP_EOL."
                Titre : {$this->titre}".PHP_EOL."
                durée : {$this->duree}".PHP_EOL."
                Année de sortie : {$this->anneeSortie}".PHP_EOL."
        ";
    }
}