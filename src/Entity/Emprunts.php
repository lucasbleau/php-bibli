<?php

require_once 'Adherents.php' ;
require_once 'Media.php' ;

class Emprunts
{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstime;

    private ?\DateTime $dateRetour ;
    private Adherents $adherents;
    private Media $media;

    /**
     * @param \DateTime $dateEmprunt
     * @param \DateTime $dateRetourEstime
     * @param Adherents $adherent
     * @param Media $media
     */
    public function __construct(Adherents $adherent, Media $media)
    {
        $this->dateEmprunt = new \DateTime();
        $this->dateRetourEstime = (new \DateTime())->modify("+{$media->getDureeEmprunt()} days");
        $this->adherents = $adherent;
        $this->media = $media;
        $this->dateRetour = null;
    }

    public function recupInfoEmprunt($id) : string
    {
        return "Date emprunt : {$this->dateEmprunt} . PHP_EOL 
                Date de retour estimé : {$this->dateRetourEstime} . PHP_EOL 
                Date de retour : {$this->dateRetour} . PHP_EOL 
                Adhérent : {$this->adherents} . PHP_EOL
                Media : {$this->media} . PHP_EOL " ;
    }

    public function verifierEmpruntEnCours() : bool
    {
        if ($this->dateRetour == null)
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }

    public function verifierEmpruntAlerte() : bool
    {
        $dateJour = new \DateTime();
        $dateRetourEstime = $this->dateRetourEstime;
        if ($this->verifierEmpruntEnCours() && $dateRetourEstime->diff($dateJour)->invert == 0 )
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }

    public function VerifierEmpruntDepasser() : bool {
        if (!$this->verifierEmpruntEnCours()){
            $dateRetourEstime = $this->dateRetourEstime;
            $dateRetour = $this->dateRetour;
            if ($dateRetour->diff($dateRetourEstime)->invert == 1 ) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return DateTime
     */
    public function getDateEmprunt(): DateTime
    {
        return $this->dateEmprunt;
    }


    /**
     * @param DateTime $dateEmprunt
     */
    public function setDateEmprunt(DateTime $dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    /**
     * @return DateTime
     */
    public function getDateRetourEstime(): DateTime
    {
        return $this->dateRetourEstime;
    }

    /**
     * @param DateTime $dateRetourEstime
     */
    public function setDateRetourEstime(DateTime $dateRetourEstime): void
    {
        $this->dateRetourEstime = $dateRetourEstime;
    }

    /**
     * @return DateTime
     */
    public function getDateRetour(): DateTime
    {
        return $this->dateRetour;
    }

    /**
     * @param DateTime $dateRetour
     */
    public function setDateRetour(DateTime $dateRetour): void
    {
        $this->dateRetour = $dateRetour;
    }


}