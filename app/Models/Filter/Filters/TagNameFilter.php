<?php declare(strict_types=1);

namespace App\Models\Filter\Filters;

use App\Models\Filter\Filter;
use Illuminate\Database\Eloquent\Builder;

class TagNameFilter implements Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        if ($value) {
            return $builder->whereHas('tags', function ($builder) use ($value) {
                return $builder->where('name', $value);
            });
        }

        return $builder;
    }
}
