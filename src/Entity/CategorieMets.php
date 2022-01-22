<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieMets
 *
 * @ORM\Table(name="categorie_mets")
 * @ORM\Entity
 */
class CategorieMets
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CATEGORIE_METS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorieMets;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE_CATEGORIE", type="string", length=50, nullable=false)
     */
    private $libelleCategorie;

    public function getIdCategorieMets(): ?int
    {
        return $this->idCategorieMets;
    }

    public function getLibelleCategorie(): ?string
    {
        return $this->libelleCategorie;
    }

    public function setLibelleCategorie(string $libelleCategorie): self
    {
        $this->libelleCategorie = $libelleCategorie;

        return $this;
    }


}
