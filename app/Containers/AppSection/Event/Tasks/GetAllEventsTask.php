<?php

namespace App\Containers\AppSection\Event\Tasks;

use App\Containers\AppSection\Event\Data\Repositories\EventRepository;
use App\Ship\Criterias\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Criterias\Criteria;
use App\Ship\Parents\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllEventsTask extends Task
{
    protected EventRepository $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function count(): int
    {
        return $this->repository->count();
    }

    public function run()
    {
        return $this->repository->paginate();
    }

    /**
     * @throws RepositoryException
     */
    public function ordered(): self
    {
        $this->repository->pushCriteria(new OrderByCreationDateDescendingCriteria());
        return $this;
    }

    /**
     * @throws RepositoryException
     */
    public function pushCriteria(Criteria $criteria): GetAllEventsTask
    {
        $this->repository->pushCriteria($criteria);
        return $this;
    }

    public function popCriteria(Criteria $criteria): GetAllEventsTask
    {
        $this->repository->popCriteria($criteria);
        return $this;
    }

    public function withRole($roles): self
    {
        $this->repository->pushCriteria(new RoleCriteria($roles));
        return $this;
    }
}
