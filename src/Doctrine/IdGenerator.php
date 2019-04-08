<?php


namespace App\Doctrine;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Ramsey\Uuid\Uuid;

class IdGenerator extends AbstractIdGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        $uuid = Uuid::uuid4()->getHex();

//        $meta = $em->getClassMetadata(get_class($entity));
//        $identifier = $meta->getSingleIdentifierFieldName();
//
//        if (null !== $em->getRepository(get_class($entity))->findOneBy(['id' => $uuid])) {
        if (null !== $em->getRepository(get_class($entity))->find($uuid)) {
            $uuid = $this->generate($em, $entity);
        }

        return $uuid;
    }

}