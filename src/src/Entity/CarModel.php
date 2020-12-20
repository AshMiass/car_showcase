<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     shortName="cars",
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=CarModelRepository::class)
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
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="carModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand_id;

    /**
     * @ORM\OneToMany(targetEntity=CarModelStock::class, mappedBy="car_model_id", orphanRemoval=true)
     */
    private $carModelStocks;

    /**
     * @ORM\OneToMany(targetEntity=ClientRequest::class, mappedBy="car_model_id")
     */
    private $clientRequests;

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

    public function getBrand(): ?Brand
    {
        return $this->brand_id;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand_id = $brand;

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
            // set the owning side to null (unless already changed)
            if ($carModelStock->getCarModelId() === $this) {
                $carModelStock->setCarModelId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ClientRequest[]
     */
    public function getClientRequests(): Collection
    {
        return $this->clientRequests;
    }

    public function addClientRequest(ClientRequest $clientRequest): self
    {
        if (!$this->clientRequests->contains($clientRequest)) {
            $this->clientRequests[] = $clientRequest;
            $clientRequest->setCarModelId($this);
        }

        return $this;
    }

    public function removeClientRequest(ClientRequest $clientRequest): self
    {
        if ($this->clientRequests->removeElement($clientRequest)) {
            // set the owning side to null (unless already changed)
            if ($clientRequest->getCarModelId() === $this) {
                $clientRequest->setCarModelId(null);
            }
        }

        return $this;
    }
}
