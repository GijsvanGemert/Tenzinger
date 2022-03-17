<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\OneToMany(mappedBy: 'werknemer_id', targetEntity: Reisgegevens::class)]
    private $reisgegevens_id;

    public function __construct()
    {
        $this->reisgegevens_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Reisgegevens>
     */
    public function getReisgegevensId(): Collection
    {
        return $this->reisgegevens_id;
    }

    public function addReisgegevensId(Reisgegevens $reisgegevensId): self
    {
        if (!$this->reisgegevens_id->contains($reisgegevensId)) {
            $this->reisgegevens_id[] = $reisgegevensId;
            $reisgegevensId->setWerknemerId($this);
        }

        return $this;
    }

    public function removeReisgegevensId(Reisgegevens $reisgegevensId): self
    {
        if ($this->reisgegevens_id->removeElement($reisgegevensId)) {
            // set the owning side to null (unless already changed)
            if ($reisgegevensId->getWerknemerId() === $this) {
                $reisgegevensId->setWerknemerId(null);
            }
        }

        return $this;
    }
}
