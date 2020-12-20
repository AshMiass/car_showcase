<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=CarModel::class, mappedBy="brand_id", orphanRemoval=true)
     */
    private $carModels;

    public function __construct()
    {
        $this->carModels = new ArrayCollection();
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
     * @return Collection|CarModel[]
     */
    public function getCarModels(): Collection
    {
        return $this->carModels;
    }

    public function addCarModel(CarModel $carModel): self
    {
        if (!$this->carModels->contains($carModel)) {
            $this->carModels[] = $carModel;
            $carModel->setBrandId($this);
        }

        return $this;
    }

    public function removeCarModel(CarModel $carModel): self
    {
        if ($this->carModels->removeElement($carModel)) {
            // set the owning side to null (unless already changed)
            if ($carModel->getBrandId() === $this) {
                $carModel->setBrandId(null);
            }
        }

        return $this;
    }
}
