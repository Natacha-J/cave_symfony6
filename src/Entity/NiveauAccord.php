<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NiveauAccord
 *
 * @ORM\Table(name="niveau_accord")
 * @ORM\Entity
 */
class NiveauAccord
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_NIVEAU_ACCORD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNiveauAccord;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE_NIVEAU_ACCORD", type="string", length=25, nullable=false)
     */
    private $libelleNiveauAccord;

    public function getIdNiveauAccord(): ?int
    {
        return $this->idNiveauAccord;
    }

    public function getLibelleNiveauAccord(): ?string
    {
        return $this->libelleNiveauAccord;
    }

    public function setLibelleNiveauAccord(string $libelleNiveauAccord): self
    {
        $this->libelleNiveauAccord = $libelleNiveauAccord;

        return $this;
    }


}
