<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

class ImdbScope implements ScopeInterface
{
    public function __construct(private readonly string $imdb)
    {
    }

    public function apply(Builder $builder): Builder
    {
        if ($this->imdb) {
            return $builder->where('imdb', $this->imdb);
        }

        return $builder;
    }
}
