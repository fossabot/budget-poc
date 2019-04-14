<?php
namespace App\EventSubscriber;

use App\Doctrine\CreatedAtInterface;
use App\Doctrine\UpdatedAtInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

/**
 * Class EntityEventSubscriber
 * @package App\EventSubscriber
 */
class EntityEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if ($entity instanceof CreatedAtInterface) {
            $this->setCreatedAt($entity);
        }

        if ($entity instanceof UpdatedAtInterface) {
            $this->setUpdatedAt($entity);
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof UpdatedAtInterface) {
            $this->setUpdatedAt($entity);
        }
    }

    protected function setCreatedAt(CreatedAtInterface $entity)
    {
        $entity->setCreatedAt(new \DateTime());
    }

    protected function setUpdatedAt(UpdatedAtInterface $entity)
    {
        $entity->setUpdatedAt(new \DateTime());
    }
}
