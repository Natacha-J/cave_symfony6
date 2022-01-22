<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mets
 *
 * @ORM\Table(name="mets", indexes={@ORM\Index(name="FK_METS_A_POUR_CA_CATEGORI", columns={"ID_CATEGORIE_METS"})})
 * @ORM\Entity
 */
class Mets
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEMETS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codemets;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="text", length=0, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIEN_RECETTE", type="string", length=200, nullable=true)
     */
    private $lienRecette;

    /**
     * @var \CategorieMets
     *
     * @ORM\ManyToOne(targetEntity="CategorieMets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CATEGORIE_METS", referencedColumnName="ID_CATEGORIE_METS")
     * })
     */
    private $idCategorieMets;

    public function getCodemets(): ?int
    {
        return $this->codemets;
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

    public function getLienRecette(): ?string
    {
        return $this->lienRecette;
    }

    public function setLienRecette(?string $lienRecette): self
    {
        $this->lienRecette = $lienRecette;

        return $this;
    }

    public function getIdCategorieMets(): ?CategorieMets
    {
        return $this->idCategorieMets;
    }

    public function setIdCategorieMets(?CategorieMets $idCategorieMets): self
    {
        $this->idCategorieMets = $idCategorieMets;

        return $this;
    }


}
