<?php

namespace App\Models\Scopes;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class TitleScope implements ScopeInterface
{
    public function __construct(private readonly string $title)
    {
    }

    /**
     * Multiple terms can be passed in using commas, which are split into
     * separate terms here.
     */
    public function getTerms(): array
    {
        return explode(',', $this->title);
    }

    /**
     * Since the archive database uses both spaces and periods as separators,
     * construct a grouped where/orWhere query that will check for either
     * representation without interfering with other queries.
     */
    public function getGroup(string $term): Closure
    {
        $term = trim($term);
        // The term with periods in place of spaces.
        $alternateTerm = str_replace(' ', '.', $term);

        return fn (Builder $builder) => $builder
            ->where('title', 'like', sprintf("%%%s%%", $term))
            ->orWhere('title', 'like', sprintf("%%%s%%", $alternateTerm));
    }

    public function apply(Builder $builder): Builder
    {
        foreach ($this->getTerms() as $term) {
            $builder = $builder->where($this->getGroup($term));
        }

        return $builder;
    }
}
