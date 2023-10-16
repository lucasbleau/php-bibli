<?php

require_once '../src/Entity/Adherents.php' ;

class AdherentTest
{
    public function verifDateAdhesion() : string
    {
        echo "Test : vérifier que la date d’adhésion, si non précisée à la création, est égale à la date du jour" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "jd@gmail.com") ;
        $dateJour = new \DateTime() ;
        if ($personne->getDateAdhesion()->format("d/m/Y")  == $dateJour->format("d/m/Y") )
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public function verifDateAdhesion2() : string
    {
        echo "Test : vérifier que la date d’adhésion, si précisée à la création, est bien prise en compte" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "10/07/2023") ;
        $dateAdhesion = $personne->getDateAdhesion() ;
        if (!empty($dateAdhesion))
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public function verifNumeroAdherent() : string
    {
        echo "Test : vérifier que le numéro d’adhérent, à la création, est valide" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "10/07/2023") ;
        $debutNum = substr($personne->getNumeroAdherent(), 0, 3) ;
        $finNum = substr($personne->getNumeroAdherent(), 3, 9) ;
        if ($debutNum == "AD-" && ($finNum > 000000 && $finNum < 999999))
        {
            return "ok";
        }
        else
        {
            return "pas ok";
        }
    }

    public function verifValideAdhesion() : string
    {
        echo "Test : vérifier que l’adhésion est valable (valide) quand la date d’adhésion n’est pas dépassée (moins d’un an)" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "10/07/2023") ;
        if ($personne->verifDateAdhesion())
        {
            return "valide" ;
        }
        else
        {
            return "non valide" ;
        }
    }


    public function verifNonValideAdhesion() : string
    {
        echo "Test : vérifier que l’adhésion est non valable (invalide) quand la date d’adhésion est dépassée (plus d’un an)" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "jd@gmail.com", "10/07/2000") ;
        if ($personne->verifDateAdhesion())
        {
            return "valide" ;
        }
        else
        {
            return "non valide" ;
        }
    }


    public function verifRenouvel() : string
    {
        echo "Test : vérifier que l’adhésion est renouvelée" ;
        echo PHP_EOL ;
        $personne = new Adherents("jean", "dujardin", "jd@gmail.com", "10/07/2022") ;
        $dateA = DateTime::createFromFormat("d/m/Y","10/07/2022");
        $dateA = $dateA->modify("+1 year")->format("d/m/Y");
        $personne->renouvelerAdhesion() ;
        if ($personne->getDateAdhesion()->format("d/m/Y") == $dateA)
        {
            return "valide" ;
        }
        else
        {
            return "non valide" ;
        }
    }

}

