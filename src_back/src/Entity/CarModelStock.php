<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=App\Repository\CarModelStockRepository::class)
 */
class CarModelStock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="smallint")
     */
    private $inStock;

    /**
     * @ORM\ManyToOne(targetEntity=CarModel::class, inversedBy="carModelStocks")
     */
    private $car_model;

    /**
     * @Groups({"car_model:read"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"car_model:read"})
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @Groups({"car_model:read"})
     */
    public function getInStock(): ?int
    {
        return $this->inStock;
    }

    public function setInStock(int $inStock): self
    {
        $this->inStock = $inStock;

        return $this;
    }

    public function getCarModel(): ?CarModel
    {
        return $this->car_model;
    }

    public function setCarModel(?CarModel $car_model): self
    {
        $this->car_model = $car_model;

        return $this;
    }
}
