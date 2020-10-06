<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DrunkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DrunkRepository::class)
 */
class Drunk
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
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="drunks")
     * @ORM\JoinColumn(nullable=true)
     */
    private $use;

    /**
     * @ORM\ManyToOne(targetEntity=Drink::class, inversedBy="drunks")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Drink;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUse(): ?User
    {
        return $this->use;
    }

    public function setUse(?User $use): self
    {
        $this->use = $use;

        return $this;
    }

    public function getDrink(): ?Drink
    {
        return $this->Drink;
    }

    public function setDrink(?Drink $Drink): self
    {
        $this->Drink = $Drink;

        return $this;
    }
}
