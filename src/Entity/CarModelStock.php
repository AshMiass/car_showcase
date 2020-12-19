<?php

namespace App\Entity;

use App\Repository\CarModelStockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarModelStockRepository::class)
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
     * @ORM\JoinColumn(nullable=false)
     */
    private $car_model_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getInStock(): ?int
    {
        return $this->inStock;
    }

    public function setInStock(int $inStock): self
    {
        $this->inStock = $inStock;

        return $this;
    }

    public function getCarModelId(): ?CarModel
    {
        return $this->car_model_id;
    }

    public function setCarModelId(?CarModel $car_model_id): self
    {
        $this->car_model_id = $car_model_id;

        return $this;
    }
}
