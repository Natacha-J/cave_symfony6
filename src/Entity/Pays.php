<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEPAYS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codepays;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMPAYS", type="text", length=0, nullable=false)
     */
    private $nompays;

    public function getCodepays(): ?int
    {
        return $this->codepays;
    }

    public function getNompays(): ?string
    {
        return $this->nompays;
    }

    public function setNompays(string $nompays): self
    {
        $this->nompays = $nompays;

        return $this;
    }


}
