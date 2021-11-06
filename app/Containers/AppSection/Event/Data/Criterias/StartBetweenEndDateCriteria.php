<?php

namespace App\Containers\AppSection\Event\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class StartBetweenEndDateCriteria extends Criteria
{
    private string $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model
            ->where(function ($query) {
                $query
                    ->whereRaw('? between start_date and end_date', [$this->date])
                    ->orWhere(function ($sub_query) {
                        $sub_query
                            ->where('start_date', '<=', $this->date)
                            ->whereNull('end_date');
                    });
            });

    }
}
