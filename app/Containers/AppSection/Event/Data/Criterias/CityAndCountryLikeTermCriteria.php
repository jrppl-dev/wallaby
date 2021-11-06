<?php

namespace App\Containers\AppSection\Event\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class CityAndCountryLikeTermCriteria extends Criteria
{
    private string $term;

    public function __construct($term)
    {
        $this->term = $term;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model
            ->where(function ($query) {
                $query->whereHas('city.country', function ($q) {
                    $q->where('name', 'like', "%$this->term%");
                })->whereHas('city', function ($q) {
                    $q->where('name', 'like', "%$this->term%");
                });
            });
    }
}
