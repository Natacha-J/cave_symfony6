<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock", indexes={@ORM\Index(name="FK_STOCK_EST_SITUE_EMPLACEM", columns={"CODE_EMPLACEMENT"})})
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODESTOCK", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codestock;

    /**
     * @var int
     *
     * @ORM\Column(name="STOCK", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var float
     *
     * @ORM\Column(name="PRIX_UNITAIRE_ACHAT", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixUnitaireAchat;

    /**
     * @var \Emplacement
     *
     * @ORM\ManyToOne(targetEntity="Emplacement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODE_EMPLACEMENT", referencedColumnName="CODE_EMPLACEMENT")
     * })
     */
    private $codeEmplacement;

    public function getCodestock(): ?int
    {
        return $this->codestock;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrixUnitaireAchat(): ?float
    {
        return $this->prixUnitaireAchat;
    }

    public function setPrixUnitaireAchat(float $prixUnitaireAchat): self
    {
        $this->prixUnitaireAchat = $prixUnitaireAchat;

        return $this;
    }

    public function getCodeEmplacement(): ?Emplacement
    {
        return $this->codeEmplacement;
    }

    public function setCodeEmplacement(?Emplacement $codeEmplacement): self
    {
        $this->codeEmplacement = $codeEmplacement;

        return $this;
    }


}
