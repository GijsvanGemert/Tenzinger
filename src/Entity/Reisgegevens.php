<?php

namespace App\Entity;

use App\Repository\ReisgegevensRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: ReisgegevensRepository::class)]
#[UniqueEntity( fields: ['datum', 'heen','werknemer_id'],
errorPath: 'datum',
message: 'This date has already been used',)]
class Reisgegevens
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $afstand;

    #[ORM\Column(type: 'string', length: 255)]
    private $vervoersmiddel;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull]
    #[Assert\Type(\DateTime::class)]
    private $datum;

    #[ORM\Column(type: 'boolean')]
    private $heen;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reisgegevens_id')]
    #[ORM\JoinColumn(nullable: false)]
    private $werknemer_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAfstand(): ?int
    {
        return $this->afstand;
    }

    public function setAfstand(int $afstand): self
    {
        $this->afstand = $afstand;

        return $this;
    }

    public function getVervoersmiddel(): ?string
    {
        return $this->vervoersmiddel;
    }

    public function setVervoersmiddel(string $vervoersmiddel): self
    {
        $this->vervoersmiddel = $vervoersmiddel;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getHeen(): ?bool
    {
        return $this->heen;
    }

    public function setHeen(bool $heen): self
    {
        $this->heen = $heen;

        return $this;
    }

    public function getWerknemerId(): ?User
    {
        return $this->werknemer_id;
    }

    public function setWerknemerId(?User $werknemer_id): self
    {
        $this->werknemer_id = $werknemer_id;

        return $this;
    }
}
