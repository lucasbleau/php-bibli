<?php

namespace Entite;

use Media;

class Livre extends Media
{
    protected string $isbn;
    protected string $auteur;
    protected int $nbrPage;

    public function __construct(string $titre,string $isbn,string $auteur,int $nbrPage)
    {
        $dureeEmprunt = 21;
        parent::__construct($titre, $dureeEmprunt);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbrPage = $nbrPage;
    }

    public function getInformationsMedia() :string
    {
        return "ISBN : {$this->isbn}".PHP_EOL."
                Titre : {$this->titre}".PHP_EOL."
                Auteur : {$this->auteur}".PHP_EOL."
                Nombre page : {$this->nbrPage}".PHP_EOL."
        
        ";
    }
}