<?php

namespace App\Containers\AppSection\Event\Tasks;

use App\Containers\AppSection\Event\Data\Criterias\TermCriteria;
use App\Containers\AppSection\Event\Data\Repositories\EventRepository;
use App\Ship\Criterias\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllEventsTask extends Task
{
    protected EventRepository $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
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
    public function addTermCriteria($term): GetAllEventsTask
    {
        $this->repository->pushCriteria(new TermCriteria($term));
        return $this;
    }

    public function addBetweenDate($date)
    {

    }

    public function withRole($roles): self
    {
        $this->repository->pushCriteria(new RoleCriteria($roles));
        return $this;
    }
}
