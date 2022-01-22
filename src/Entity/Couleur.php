<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Couleur
 *
 * @ORM\Table(name="couleur")
 * @ORM\Entity
 */
class Couleur
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODECOULEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecouleur;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMCOULEUR", type="string", length=50, nullable=false)
     */
    private $nomcouleur;

    public function getCodecouleur(): ?int
    {
        return $this->codecouleur;
    }

    public function getNomcouleur(): ?string
    {
        return $this->nomcouleur;
    }

    public function setNomcouleur(string $nomcouleur): self
    {
        $this->nomcouleur = $nomcouleur;

        return $this;
    }


}
