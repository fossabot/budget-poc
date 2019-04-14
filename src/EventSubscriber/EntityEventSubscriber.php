<?php
namespace App\EventSubscriber;

use App\Doctrine\CreatedAtInterface;
use App\Doctrine\UpdatedAtInterface;
use App\Service\ClockInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

/**
 * Class EntityEventSubscriber
 * @package App\EventSubscriber
 */
class EntityEventSubscriber implements EventSubscriber
{
    /** @var ClockInterface */
    protected $timeService;

    /**
     * EntityEventSubscriber constructor.
     * @param ClockInterface $timeService
     */
    public function __construct(ClockInterface $timeService)
    {
        $this->timeService = $timeService;
    }

    /**
     * @return array|string[]
     */
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
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

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof UpdatedAtInterface) {
            $this->setUpdatedAt($entity);
        }
    }

    /**
     * @param CreatedAtInterface $entity
     */
    protected function setCreatedAt(CreatedAtInterface $entity)
    {
        $entity->setCreatedAt($this->timeService->now());
    }

    /**
     * @param UpdatedAtInterface $entity
     */
    protected function setUpdatedAt(UpdatedAtInterface $entity)
    {
        $entity->setUpdatedAt($this->timeService->now());
    }
}
