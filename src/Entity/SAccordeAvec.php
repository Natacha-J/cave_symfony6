<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SAccordeAvec
 *
 * @ORM\Table(name="s_accorde_avec", indexes={@ORM\Index(name="FK_S_ACCORD_S_ACCORDE_NIVEAU_A", columns={"ID_NIVEAU_ACCORD"}), @ORM\Index(name="FK_S_ACCORD_S_ACCORDE_VIN", columns={"CODEVIN"}), @ORM\Index(name="IDX_C6A53F294733D761", columns={"CODEMETS"})})
 * @ORM\Entity
 */
class SAccordeAvec
{
    /**
     * @var \NiveauAccord
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NiveauAccord")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NIVEAU_ACCORD", referencedColumnName="ID_NIVEAU_ACCORD")
     * })
     */
    private $idNiveauAccord;

    /**
     * @var \Mets
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Mets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEMETS", referencedColumnName="CODEMETS")
     * })
     */
    private $codemets;

    /**
     * @var \Vin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Vin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEVIN", referencedColumnName="CODEVIN")
     * })
     */
    private $codevin;

    public function getIdNiveauAccord(): ?NiveauAccord
    {
        return $this->idNiveauAccord;
    }

    public function setIdNiveauAccord(?NiveauAccord $idNiveauAccord): self
    {
        $this->idNiveauAccord = $idNiveauAccord;

        return $this;
    }

    public function getCodemets(): ?Mets
    {
        return $this->codemets;
    }

    public function setCodemets(?Mets $codemets): self
    {
        $this->codemets = $codemets;

        return $this;
    }

    public function getCodevin(): ?Vin
    {
        return $this->codevin;
    }

    public function setCodevin(?Vin $codevin): self
    {
        $this->codevin = $codevin;

        return $this;
    }


}
