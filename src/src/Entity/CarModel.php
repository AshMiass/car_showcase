<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
*  @ApiResource(
*       shortName="cars",
*       collectionOperations={"get"},
*       itemOperations={
*           "get"={"normalization_context"={"groups"={"car_model:read"}}}, 
*       },
*       normalizationContext={"groups"={"car_model:read"}},
*       denormalizationContext={"groups"={"car_model:write"}}
* )
* @ORM\Entity(repositoryClass=App\Repository\CarModelRepository::class)
*/
class CarModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"car_model:read", "car_model:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=4)
     * @Groups({"car_model:read", "car_model:write"})
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class)
     * @ORM\JoinColumn(nullable=false, name="brand_id", referencedColumnName="id")
     * @Groups({"car_model:read"})
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity=CarModelStock::class, mappedBy="car_model")
     * @Groups({"car_model:read"})
     */
    private $carModelStocks;


    public function __construct()
    {
        $this->carModelStocks = new ArrayCollection();
        $this->clientRequests = new ArrayCollection();
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

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
    
    /**
     * @Groups({"car_model:read"})
     */
    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|CarModelStock[]
     */
    public function getCarModelStocks(): Collection
    {
        return $this->carModelStocks;
    }

    public function addCarModelStock(CarModelStock $carModelStock): self
    {
        if (!$this->carModelStocks->contains($carModelStock)) {
            $this->carModelStocks[] = $carModelStock;
            $carModelStock->setCarModelId($this);
        }

        return $this;
    }

    public function removeCarModelStock(CarModelStock $carModelStock): self
    {
        if ($this->carModelStocks->removeElement($carModelStock)) {
            if ($carModelStock->getCarModelId() === $this) {
                $carModelStock->setCarModelId(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection|ClientRequest[]
    //  */
    // public function getClientRequests(): Collection
    // {
    //     return $this->clientRequests;
    // }

    // public function addClientRequest(ClientRequest $clientRequest): self
    // {
    //     if (!$this->clientRequests->contains($clientRequest)) {
    //         $this->clientRequests[] = $clientRequest;
    //         $clientRequest->setCarModel($this);
    //     }

    //     return $this;
    // }
}
