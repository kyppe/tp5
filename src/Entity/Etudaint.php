<?php

namespace App\Entity;

use App\Repository\EtudaintRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudaintRepository::class)]
class Etudaint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mone = null;
/**
      * @ORM\ManyToOne(targetEntity= "institut")
      * @ORM\JoinColumn(name="institut_id", referencedColumnName="id")
      */
      

    #[ORM\Column(length: 255)]
    private ?string $instit = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * Get nome
     *
     * @return \gestscolBundle\Entity\institut
     */

    public function getMone(): ?string
    {
        return $this->mone;
    }

    public function setMone(string $mone): self
    {
        $this->mone = $mone;

        return $this;
    }

    public function getInstit(): ?string
    {
        return $this->instit;
    }
  /**
     * Set instit
     *
     * @param test\gestscolBundle\Entity\institut $instit
     *
     * @return etudiant
     */

    public function setInstit(string $instit): self
    {
        $this->instit = $instit;

        return $this;
    }
}
