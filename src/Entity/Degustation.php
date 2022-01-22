<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Degustation
 *
 * @ORM\Table(name="degustation", indexes={@ORM\Index(name="FK_DEGUSTAT_A_ETE_DEG_STOCK", columns={"CODESTOCK"})})
 * @ORM\Entity
 */
class Degustation
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEDEGUSTATION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codedegustation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE", type="date", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="QUANTITE", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \Stock
     *
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODESTOCK", referencedColumnName="CODESTOCK")
     * })
     */
    private $codestock;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Invites", inversedBy="codedegustation")
     * @ORM\JoinTable(name="a_deguste",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CODEDEGUSTATION", referencedColumnName="CODEDEGUSTATION")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CODEINVITE", referencedColumnName="CODEINVITE")
     *   }
     * )
     */
    private $codeinvite;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeinvite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodedegustation(): ?int
    {
        return $this->codedegustation;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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

    /**
     * @return Collection|Invites[]
     */
    public function getCodeinvite(): Collection
    {
        return $this->codeinvite;
    }

    public function addCodeinvite(Invites $codeinvite): self
    {
        if (!$this->codeinvite->contains($codeinvite)) {
            $this->codeinvite[] = $codeinvite;
        }

        return $this;
    }

    public function removeCodeinvite(Invites $codeinvite): self
    {
        $this->codeinvite->removeElement($codeinvite);

        return $this;
    }

}
