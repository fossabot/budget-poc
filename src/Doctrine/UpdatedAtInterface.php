<?php
namespace App\Doctrine;

use DateTimeInterface;

/**
 * Interface UpdatedAt
 * @package App\Doctrine
 */
interface UpdatedAtInterface
{
    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface $updatedAt
     * @return UpdatedAtInterface
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self;
}
