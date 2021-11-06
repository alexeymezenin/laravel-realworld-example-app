<?php declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Filter\RequestFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    public function scopeRequestFilter(
        Builder $builder,
        array $request,
        array $filters = []
    ): Builder
    {
        $filter = new RequestFilter($request, $filters);

        return $filter->filter($builder);
    }
}
