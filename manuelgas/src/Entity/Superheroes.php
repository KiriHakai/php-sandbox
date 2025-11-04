<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SuperheroesRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuperheroesRepository::class)]
#[ApiResource]
class Superheroes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    #[Assert\NotBlank]

    private ?string $name = null;

    #[ORM\Column(length: 70)]
    #[Assert\NotBlank]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?bool $featured = false;



    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(?bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }

    public function updatedTimestamps()
    {
        if ($this->created_at == null) {
            $this->created_at = new \DateTime('now');
        }
    }

//    public function getCreatedAt(): ?\DateTimeImmutable
//    {
//        return $this->created_at;
//    }
//
//    public function setCreatedAt(\DateTimeImmutable $created_at): static
//    {
//        $this->created_at = $created_at;
//
//        return $this;
//    }

    public function __toString(): string
    {
        return $this->name;
    }
}
