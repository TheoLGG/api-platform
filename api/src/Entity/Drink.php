<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DrinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DrinkRepository::class)
 */
class Drink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Drunk::class, mappedBy="Drink")
     */
    private $drunks;

    public function __construct()
    {
        $this->drunks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Drunk[]
     */
    public function getDrunks(): Collection
    {
        return $this->drunks;
    }

    public function addDrunk(Drunk $drunk): self
    {
        if (!$this->drunks->contains($drunk)) {
            $this->drunks[] = $drunk;
            $drunk->setDrink($this);
        }

        return $this;
    }

    public function removeDrunk(Drunk $drunk): self
    {
        if ($this->drunks->contains($drunk)) {
            $this->drunks->removeElement($drunk);
            // set the owning side to null (unless already changed)
            if ($drunk->getDrink() === $this) {
                $drunk->setDrink(null);
            }
        }

        return $this;
    }
}
