<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements ScopeInterface
{
    public function __construct(
        private readonly string $category,
        private readonly bool $includeXxx,
    )
    {
    }

    public function apply(Builder $builder): Builder
    {
        if ($this->category && $this->category !== '') {
            return $builder->where('cat', $this->category);
        }

        if (!$this->includeXxx) {
            return $builder->whereNot('cat', 'xxx');
        }

        return $builder;
    }
}
