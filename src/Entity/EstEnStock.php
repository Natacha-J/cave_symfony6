<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstEnStock
 *
 * @ORM\Table(name="est_en_stock", indexes={@ORM\Index(name="FK_EST_EN_S_EST_EN_ST_STOCK", columns={"CODESTOCK"}), @ORM\Index(name="FK_EST_EN_S_EST_EN_ST_MILLESIM", columns={"CODEMILLESIME"}), @ORM\Index(name="FK_EST_EN_S_EST_EN_ST_CONTENAN", columns={"CODECONTENANCE"}), @ORM\Index(name="IDX_CDE3C0F8CFD6947C", columns={"CODEVIN"})})
 * @ORM\Entity
 */
class EstEnStock
{
    /**
     * @var \Millesime
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Millesime")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEMILLESIME", referencedColumnName="CODEMILLESIME")
     * })
     */
    private $codemillesime;

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

    /**
     * @var \Contenance
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Contenance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODECONTENANCE", referencedColumnName="CODECONTENANCE")
     * })
     */
    private $codecontenance;

    /**
     * @var \Stock
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODESTOCK", referencedColumnName="CODESTOCK")
     * })
     */
    private $codestock;

    public function getCodemillesime(): ?Millesime
    {
        return $this->codemillesime;
    }

    public function setCodemillesime(?Millesime $codemillesime): self
    {
        $this->codemillesime = $codemillesime;

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

    public function getCodecontenance(): ?Contenance
    {
        return $this->codecontenance;
    }

    public function setCodecontenance(?Contenance $codecontenance): self
    {
        $this->codecontenance = $codecontenance;

        return $this;
    }

    public function getCodestock(): ?Stock
    {
        return $this->codestock;
    }

    public function setCodestock(?Stock $codestock): self
    {
        $this->codestock = $codestock;

        return $this;
    }


}
