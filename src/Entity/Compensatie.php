<?php

namespace App\Entity;

use App\Repository\CompensatieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompensatieRepository::class)]
class Compensatie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $vervoersmiddel;

    #[ORM\Column(type: 'integer')]
    private $aantal_kilometer;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2)]
    private $compensatie;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAantalKilometer(): ?int
    {
        return $this->aantal_kilometer;
    }

    public function setAantalKilometer(int $aantal_kilometer): self
    {
        $this->aantal_kilometer = $aantal_kilometer;

        return $this;
    }

    public function getCompensatie(): ?string
    {
        return $this->compensatie;
    }

    public function setCompensatie(string $compensatie): self
    {
        $this->compensatie = $compensatie;

        return $this;
    }
}
