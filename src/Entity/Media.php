<?php

abstract class Media
{
    protected string $titre;
    protected int $dureeEmprunt;


    public function __construct(string $titre,int $dureeEmprunt)
    {
        $this->titre = $titre;
        $this->dureeEmprunt = $dureeEmprunt;
    }

//    public function getInformationsMedia()
//    {
//
//    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @return int
     */
    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }



}