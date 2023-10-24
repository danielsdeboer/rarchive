<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

interface ScopeInterface
{
    public function apply(Builder $builder): Builder;
}
