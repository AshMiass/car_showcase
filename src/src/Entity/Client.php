<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=ClientRequest::class, mappedBy="client_id")
     */
    private $clientRequests;

    public function __construct()
    {
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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
            $clientRequest->setClientId($this);
        }

        return $this;
    }

    public function removeClientRequest(ClientRequest $clientRequest): self
    {
        if ($this->clientRequests->removeElement($clientRequest)) {
            // set the owning side to null (unless already changed)
            if ($clientRequest->getClientId() === $this) {
                $clientRequest->setClientId(null);
            }
        }

        return $this;
    }
}
