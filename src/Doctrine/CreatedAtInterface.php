<?php
namespace App\Doctrine;

use DateTimeInterface;

/**
 * interface CreateAtInterface
 * @package App\Doctrine
 */
interface CreatedAtInterface
{
    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface $createdAt
     * @return CreatedAtInterface
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self;
}
