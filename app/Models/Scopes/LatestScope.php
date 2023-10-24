<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

class LatestScope implements ScopeInterface
{
    public function apply(Builder $builder): Builder
    {
        return $builder->orderBy('dt', 'desc');
    }
}
