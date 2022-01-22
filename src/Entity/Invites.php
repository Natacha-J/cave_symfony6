<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Invites
 *
 * @ORM\Table(name="invites")
 * @ORM\Entity
 */
class Invites
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEINVITE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeinvite;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="text", length=0, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="text", length=0, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSEMAIL", type="text", length=0, nullable=false)
     */
    private $adressemail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Degustation", mappedBy="codeinvite")
     */
    private $codedegustation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codedegustation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodeinvite(): ?int
    {
        return $this->codeinvite;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdressemail(): ?string
    {
        return $this->adressemail;
    }

    public function setAdressemail(string $adressemail): self
    {
        $this->adressemail = $adressemail;

        return $this;
    }

    /**
     * @return Collection|Degustation[]
     */
    public function getCodedegustation(): Collection
    {
        return $this->codedegustation;
    }

    public function addCodedegustation(Degustation $codedegustation): self
    {
        if (!$this->codedegustation->contains($codedegustation)) {
            $this->codedegustation[] = $codedegustation;
            $codedegustation->addCodeinvite($this);
        }

        return $this;
    }

    public function removeCodedegustation(Degustation $codedegustation): self
    {
        if ($this->codedegustation->removeElement($codedegustation)) {
            $codedegustation->removeCodeinvite($this);
        }

        return $this;
    }

}
