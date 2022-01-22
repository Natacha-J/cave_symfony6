<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vin
 *
 * @ORM\Table(name="vin", indexes={@ORM\Index(name="FK_VIN_A_POUR_AP_APPELLAT", columns={"CODEAPPELLATION"}), @ORM\Index(name="FK_VIN_A_POUR_CO_COULEUR", columns={"CODECOULEUR"}), @ORM\Index(name="FK_VIN_EST_DE_LA_REGION", columns={"CODEREGION"})})
 * @ORM\Entity
 */
class Vin
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEVIN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codevin;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_CUVEE", type="string", length=150, nullable=false)
     */
    private $nomCuvee;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPE_DE_CULTURE", type="string", length=1024, nullable=false)
     */
    private $typeDeCulture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMMENTAIRES", type="text", length=65535, nullable=true)
     */
    private $commentaires;

    /**
     * @var \Couleur
     *
     * @ORM\ManyToOne(targetEntity="Couleur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODECOULEUR", referencedColumnName="CODECOULEUR")
     * })
     */
    private $codecouleur;

    /**
     * @var \Appellation
     *
     * @ORM\ManyToOne(targetEntity="Appellation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEAPPELLATION", referencedColumnName="CODEAPPELLATION")
     * })
     */
    private $codeappellation;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEREGION", referencedColumnName="CODEREGION")
     * })
     */
    private $coderegion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cepage", mappedBy="codevin")
     */
    private $codecepage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codecepage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodevin(): ?int
    {
        return $this->codevin;
    }

    public function getNomCuvee(): ?string
    {
        return $this->nomCuvee;
    }

    public function setNomCuvee(string $nomCuvee): self
    {
        $this->nomCuvee = $nomCuvee;

        return $this;
    }

    public function getTypeDeCulture(): ?string
    {
        return $this->typeDeCulture;
    }

    public function setTypeDeCulture(string $typeDeCulture): self
    {
        $this->typeDeCulture = $typeDeCulture;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getCodecouleur(): ?Couleur
    {
        return $this->codecouleur;
    }

    public function setCodecouleur(?Couleur $codecouleur): self
    {
        $this->codecouleur = $codecouleur;

        return $this;
    }

    public function getCodeappellation(): ?Appellation
    {
        return $this->codeappellation;
    }

    public function setCodeappellation(?Appellation $codeappellation): self
    {
        $this->codeappellation = $codeappellation;

        return $this;
    }

    public function getCoderegion(): ?Region
    {
        return $this->coderegion;
    }

    public function setCoderegion(?Region $coderegion): self
    {
        $this->coderegion = $coderegion;

        return $this;
    }

    /**
     * @return Collection|Cepage[]
     */
    public function getCodecepage(): Collection
    {
        return $this->codecepage;
    }

    public function addCodecepage(Cepage $codecepage): self
    {
        if (!$this->codecepage->contains($codecepage)) {
            $this->codecepage[] = $codecepage;
            $codecepage->addCodevin($this);
        }

        return $this;
    }

    public function removeCodecepage(Cepage $codecepage): self
    {
        if ($this->codecepage->removeElement($codecepage)) {
            $codecepage->removeCodevin($this);
        }

        return $this;
    }

}
