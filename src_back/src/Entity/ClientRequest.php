<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      shortName="request",
 *      collectionOperations={"get","post"},
 *      itemOperations={"get","put"},
 *      normalizationContext={"groups"={"request:read"}},
 *      denormalizationContext={"groups"={"request:write"}},
 * )
 * @ORM\Entity(repositoryClass=App\Repository\ClientRequestRepository::class)
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
     * @Assert\NotBlank(message="Это поле не может быть пустым")
     * @var \DateTime
     */
    private $request_date;

    /**
     * @ORM\ManyToOne(targetEntity=CarModel::class)
     * @ORM\JoinColumn(nullable=false, name="car_model_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Это поле не может быть пустым")
     */
    private $car_model;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Это поле не может быть пустым")
     * @Assert\Length(
     *     min=2,
     *     max=100,
     *     maxMessage="Максимальная длина имени не должна превышать 100 символов",
     *     minMessage="Имя должно быть длинее 1 буквы"
     * )
     */
    private $client_name;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Это поле не может быть пустым")
     * @Assert\Regex(
     *     pattern="/^\d{10}$/",
     *     message="Номер телефона должен состоять из 10 цифр"
     * )
     */
    private $client_phone;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Это поле не может быть пустым")
     * @Assert\Email(
     *     message = "Email '{{ value }}' не корректный."
     * )
     */
    private $client_email;

    public function __construct()
    {
        $this->request_date = new \DateTimeImmutable();
    }
  
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"request:read"})
     */
    public function getRequestDate(): ?\DateTimeInterface
    {
        return $this->request_date;
    }
    
    public function setRequestDate(\DateTimeInterface $request_date): self
    {
        $this->request_date = $request_date;

        return $this;
    }

    /**
     * @Groups({"request:read"})
     */
    public function getCarModel(): ?CarModel
    {
        return $this->car_model;
    }

    /**
     * @Groups({"request:write"})
     */
    public function setCarModel(?CarModel $car_model): self
    {
        $this->car_model = $car_model;

        return $this;
    }

    /**
     * @Groups({"request:read"})
     */
    public function getClientName(): ?string
    {
        return $this->client_name;
    }

    /**
     * @Groups({"request:write"})
    */
    public function setClientName(string $client_name): self
    {
        $this->client_name = $client_name;

        return $this;
    }

    /**
     * @Groups({"request:read"})
     */
    public function getClientPhone(): ?string
    {
        return $this->client_phone;
    }

    /**
     * @Groups({"request:write"})
     */
    public function setClientPhone(string $client_phone): self
    {
        $this->client_phone = $client_phone;

        return $this;
    }

    /**
     * @Groups({"request:read"})
     */
    public function getClientEmail(): ?string
    {
        return $this->client_email;
    }

    /**
     * @Groups({"request:write"})
     */
    public function setClientEmail(string $client_email): self
    {
        $this->client_email = $client_email;

        return $this;
    }
}