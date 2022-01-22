<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenance
 *
 * @ORM\Table(name="contenance")
 * @ORM\Entity
 */
class Contenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODECONTENANCE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecontenance;

    /**
     * @var float
     *
     * @ORM\Column(name="CAPACITE", type="float", precision=10, scale=0, nullable=false)
     */
    private $capacite;

    public function getCodecontenance(): ?int
    {
        return $this->codecontenance;
    }

    public function getCapacite(): ?float
    {
        return $this->capacite;
    }

    public function setCapacite(float $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }


}
