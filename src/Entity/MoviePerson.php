<?php

namespace App\Entity;

use App\Repository\MoviePersonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoviePersonRepository::class)]
class MoviePerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private array $role = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(?array $role): self
    {
        $this->role = $role;

        return $this;
    }
}
