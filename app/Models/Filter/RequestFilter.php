<?php declare(strict_types=1);

namespace App\Models\Filter;

use App\Models\Filters\FilterAbstract;
use App\Models\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class RequestFilter
{
    protected array $request;
    // здесь можно юзать дефолтные фильтры
    protected array $filters = [
        // 'example' => ExampleFilter::class
    ];

    public function __construct(array $request, array $filters)
    {
        $this->request = $request;
        $this->filters = array_merge($this->filters, $filters);
    }

    public function filter(Builder $builder): Builder
    {
        foreach ($this->getFilters() as $key => $value) {
            $filter = new $this->filters[$key];
            $filter->filter($builder, $value);
        }

        return $builder;
    }

    protected function getFilters(): array
    {
        return array_filter(
            Arr::only(
                $this->request,
                array_keys($this->filters)
            )
        );
    }
}
