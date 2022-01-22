<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region", indexes={@ORM\Index(name="FK_REGION_EST_DU_PA_PAYS", columns={"CODEPAYS"})})
 * @ORM\Entity
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEREGION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderegion;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMREGION", type="text", length=0, nullable=false)
     */
    private $nomregion;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEPAYS", referencedColumnName="CODEPAYS")
     * })
     */
    private $codepays;

    public function getCoderegion(): ?int
    {
        return $this->coderegion;
    }

    public function getNomregion(): ?string
    {
        return $this->nomregion;
    }

    public function setNomregion(string $nomregion): self
    {
        $this->nomregion = $nomregion;

        return $this;
    }

    public function getCodepays(): ?Pays
    {
        return $this->codepays;
    }

    public function setCodepays(?Pays $codepays): self
    {
        $this->codepays = $codepays;

        return $this;
    }


}
