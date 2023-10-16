<?php

class Adherents
{
    private string $numeroAdherent;
    private string $nom;
    private string $prenom;
    private string $email;
    private ?\DateTime $dateAdhesion;

    public function __construct($nom, $prenom, $email, $dateAdhesion = null)
    {
        $this->numeroAdherent = $this->genererNumero() ;
        $this->nom = $nom ;
        $this->prenom = $prenom ;
        $this->email = $email ;
        if ($dateAdhesion == null) {
            $this->dateAdhesion = new \DateTime();;
        } else {
            $this->dateAdhesion = \DateTime::createFromFormat("d/m/Y",$dateAdhesion);
        }
    }

    public function genererNumero() : string
    {
        return "AD-" . rand(100000, 999999) ;
    }

    public function renouvelerAdhesion() : void
    {
        $this->dateAdhesion = $this->dateAdhesion->modify("+1 year");
    }

    public function recupInfoAdherent($numeroAdherent) : string
    {
        return "Nom : {$this->nom} . PHP_EOL 
                Prenom : {$this->prenom} . PHP_EOL 
                Email : {$this->email} . PHP_EOL 
                DateAdhesion : {$this->nom} . PHP_EOL " ;
    }

    public function verifDateAdhesion() : bool
    {
        $dateValide = \DateTime::createFromFormat("d/m/Y",$this->dateAdhesion->format("d/m/Y"));
        $dateValide->modify("+1 year");
        $dateJour = new \DateTime();
        if ($dateJour->diff($dateValide)->invert == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }

    /**
     * @param int $numeroAdherent
     */
    public function setNumeroAdherent(int $numeroAdherent): void
    {
        $this->numeroAdherent = $numeroAdherent;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return DateTime
     */
    public function getDateAdhesion(): DateTime
    {
        return $this->dateAdhesion;
    }

    /**
     * @param DateTime $dateAdhesion
     */
    public function setDateAdhesion(DateTime $dateAdhesion): void
    {
        $this->dateAdhesion = $dateAdhesion;
    }


}

