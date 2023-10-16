<?php

require_once '../src/Entity/Emprunts.php' ;
require_once '../src/Entity/Livre.php' ;
require_once '../src/Entity/BlueRay.php' ;
require_once '../src/Entity/Magazine.php' ;


class EmpruntTest
{

    public function VerifDateEmprunt() : string
    {
        echo "Test : vérifier que la date d’emprunt, à la création, est égale à la date du jour";
        echo PHP_EOL;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $livre = new \Entite\Livre("essaie", "isbn-1", "auteur1", 100) ;
        $emprunt = new Emprunts($adherent, $livre) ;
        $dateJour = (new \DateTime())->format("d/m/Y");
        if ($emprunt->getDateEmprunt()->format("d/m/Y") == $dateJour) {
            return "ok" ;
        } else {
            return"pas ok" ;
        }
    }

    public function VerifDateRetourLivre() : string
    {
        echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 21 jours pour l’emprunt d’un livre" ;
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $livre = new \Entite\Livre("essaie", "isbn-1", "auteur1", 100) ;
        $emprunt = new Emprunts($adherent, $livre) ;
        $date21Jours = (new \DateTime())->modify("+ 21 days")->format("d/m/Y");
        if ($emprunt->getDateRetourEstime() == $date21Jours)
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public function VerifDateRetourBlueRay() : string
    {
        echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un blu-ray" ;
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $blueray = new \Entite\BlueRay("essaie", "rea1", 100, "2002") ;
        $emprunt = new Emprunts($adherent, $blueray) ;
        $date21Jours = (new \DateTime())->modify("+ 15 days")->format("d/m/Y");
        if ($emprunt->getDateRetourEstime() == $date21Jours)
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public function VerifDateRetourMag() : string
    {
        echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine" ;
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $mag = new \Entite\Magazine(235520, "mag1", "20/03/2000") ;
        $emprunt = new Emprunts($adherent, $mag) ;
        $date21Jours = (new \DateTime())->modify("+ 10 days")->format("d/m/Y");
        if ($emprunt->getDateRetourEstime() == $date21Jours)
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public function VerifDateEmpruntCours() : string
    {
        echo "Test : vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée" ;
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $livre = new \Entite\Livre("essaie2", "isbn-200121", "auteur2", 200) ;
        $emprunt = new Emprunts($adherent, $livre) ;
        if ($emprunt->verifierEmpruntEnCours())
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }

    }

    public function VerifDateEmpruntAlerte()
    {
        echo "Test : vérifier que l’emprunt est en alerte quand la date de retour estimée est antérieure à la date du jour et que l’emprunt est en cours" ;
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $livre = new \Entite\Livre("essaie2", "isbn-200121", "auteur2", 200) ;
        $emprunt = new Emprunts($adherent, $livre) ;
        $emprunt->setDateRetourEstime($emprunt->getDateRetourEstime()->modify("-100 days"));
        if ($emprunt->verifierEmpruntAlerte())
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }

    public  function VerifDateEmpruntDepasse()
    {
        echo "Test : vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée";
        echo PHP_EOL ;
        $adherent=  new Adherents("michel","maurice","mm@test.fr");
        $livre = new \Entite\Livre("essaie2", "isbn-200121", "auteur2", 200) ;
        $emprunt = new Emprunts($adherent, $livre) ;
        $emprunt->setDateRetour(DateTime::createFromFormat("d/m/Y","20/11/2023"));
        if ($emprunt->verifierEmpruntDepasser())
        {
            return "ok" ;
        }
        else
        {
            return "pas ok" ;
        }
    }
}