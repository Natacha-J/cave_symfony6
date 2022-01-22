<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emplacement
 *
 * @ORM\Table(name="emplacement")
 * @ORM\Entity
 */
class Emplacement
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODE_EMPLACEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeEmplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE_EMPLACEMENT", type="string", length=100, nullable=false)
     */
    private $libelleEmplacement;

    public function getCodeEmplacement(): ?int
    {
        return $this->codeEmplacement;
    }

    public function getLibelleEmplacement(): ?string
    {
        return $this->libelleEmplacement;
    }

    public function setLibelleEmplacement(string $libelleEmplacement): self
    {
        $this->libelleEmplacement = $libelleEmplacement;

        return $this;
    }


}
