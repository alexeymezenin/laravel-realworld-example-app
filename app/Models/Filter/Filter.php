<?php declare(strict_types=1);

namespace App\Models\Filter;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function filter(Builder $builder, $value): Builder;
}
