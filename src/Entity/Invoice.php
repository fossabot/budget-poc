<?php

namespace App\Entity;

use App\Doctrine\CreatedAtInterface;
use App\Doctrine\UpdatedAtInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceRepository")
 */
class Invoice implements CreatedAtInterface, UpdatedAtInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Doctrine\IdGenerator")
     * @ORM\Column(type="guid", name="invoice_id")
     */
    private $invoiceId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="invoices")
     * @ORM\JoinColumn(nullable=false, name="client_id", referencedColumnName="client_id")
     */
    private $client_id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $number;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $sent_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $paid_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount_ht;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount_ttc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getInvoiceId(): ?string
    {
        return $this->invoiceId;
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

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getSentAt(): ?\DateTimeInterface
    {
        return $this->sent_at;
    }

    public function setSentAt(?\DateTimeInterface $sent_at): self
    {
        $this->sent_at = $sent_at;

        return $this;
    }

    public function getPaidAt(): ?\DateTimeInterface
    {
        return $this->paid_at;
    }

    public function setPaidAt(?\DateTimeInterface $paid_at): self
    {
        $this->paid_at = $paid_at;

        return $this;
    }

    public function getAmountHt(): ?int
    {
        return $this->amount_ht;
    }

    public function setAmountHt(int $amount_ht): self
    {
        $this->amount_ht = $amount_ht;

        return $this;
    }

    public function getAmountTtc(): ?int
    {
        return $this->amount_ttc;
    }

    public function setAmountTtc(int $amount_ttc): self
    {
        $this->amount_ttc = $amount_ttc;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): CreatedAtInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): UpdatedAtInterface
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString(): string
    {
        return $this->number;
    }
}
