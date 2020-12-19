<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     shortName="request",
 *     collectionOperations={},
 *     itemOperations={"get","put"}
 * )
 * @ORM\Entity(repositoryClass=ClientRequestRepository::class)
 */
class ClientRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $request_date;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="clientRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity=CarModel::class, inversedBy="clientRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car_model_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestDate(): ?\DateTimeInterface
    {
        return $this->request_date;
    }

    public function setRequestDate(\DateTimeInterface $request_date): self
    {
        $this->request_date = $request_date;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

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
