<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appellation
 *
 * @ORM\Table(name="appellation")
 * @ORM\Entity
 */
class Appellation
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEAPPELLATION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeappellation;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMAPPELLATION", type="string", length=50, nullable=false)
     */
    private $nomappellation;

    public function getCodeappellation(): ?int
    {
        return $this->codeappellation;
    }

    public function getNomappellation(): ?string
    {
        return $this->nomappellation;
    }

    public function setNomappellation(string $nomappellation): self
    {
        $this->nomappellation = $nomappellation;

        return $this;
    }


}
