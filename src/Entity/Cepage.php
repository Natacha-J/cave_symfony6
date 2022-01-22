<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cepage
 *
 * @ORM\Table(name="cepage")
 * @ORM\Entity
 */
class Cepage
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODECEPAGE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecepage;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMCEPAGE", type="text", length=0, nullable=false)
     */
    private $nomcepage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vin", inversedBy="codecepage")
     * @ORM\JoinTable(name="a_pour_cepage",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CODECEPAGE", referencedColumnName="CODECEPAGE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CODEVIN", referencedColumnName="CODEVIN")
     *   }
     * )
     */
    private $codevin;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codevin = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodecepage(): ?int
    {
        return $this->codecepage;
    }

    public function getNomcepage(): ?string
    {
        return $this->nomcepage;
    }

    public function setNomcepage(string $nomcepage): self
    {
        $this->nomcepage = $nomcepage;

        return $this;
    }

    /**
     * @return Collection|Vin[]
     */
    public function getCodevin(): Collection
    {
        return $this->codevin;
    }

    public function addCodevin(Vin $codevin): self
    {
        if (!$this->codevin->contains($codevin)) {
            $this->codevin[] = $codevin;
        }

        return $this;
    }

    public function removeCodevin(Vin $codevin): self
    {
        $this->codevin->removeElement($codevin);

        return $this;
    }

}
