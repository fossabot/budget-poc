<?php
namespace App\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Exception;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

/**
 * Class IdGenerator
 * @package App\Doctrine
 */
class IdGenerator extends AbstractIdGenerator
{
    /**
     * @param EntityManager $entityManager
     * @param object|null $entity
     * @return mixed|string
     * @throws Exception
     */
    public function generate(EntityManager $entityManager, $entity)
    {
        if (! is_object($entity)) {
            throw new InvalidArgumentException('Invalid $entity provided, object expected');
        }

        $uuid = Uuid::uuid4()->getHex();
        if (null !== $entityManager->getRepository(get_class($entity))->find($uuid)) {
            $uuid = $this->generate($entityManager, $entity);
        }

        return $uuid;
    }
}
