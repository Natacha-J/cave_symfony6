<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Millesime
 *
 * @ORM\Table(name="millesime")
 * @ORM\Entity
 */
class Millesime
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODEMILLESIME", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codemillesime;

    /**
     * @var int
     *
     * @ORM\Column(name="MILLESIME", type="bigint", nullable=false)
     */
    private $millesime;

    public function getCodemillesime(): ?int
    {
        return $this->codemillesime;
    }

    public function getMillesime(): ?string
    {
        return $this->millesime;
    }

    public function setMillesime(string $millesime): self
    {
        $this->millesime = $millesime;

        return $this;
    }


}
