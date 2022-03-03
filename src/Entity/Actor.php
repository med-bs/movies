<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Movie::class, mappedBy: 'actors')]
    private $no;

    public function __construct()
    {
        $this->no = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Movie>
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(Movie $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->addActor($this);
        }

        return $this;
    }

    public function removeNo(Movie $no): self
    {
        if ($this->no->removeElement($no)) {
            $no->removeActor($this);
        }

        return $this;
    }
}
