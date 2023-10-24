<?php

namespace App\Repo;

use App\Models\Item;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository;
use Psr\SimpleCache\InvalidArgumentException;

class Categories
{
    private readonly Repository $store;

    public function __construct(CacheManager $cacheManager)
    {
        $this->store = $cacheManager->store();
    }

    public function all(): array
    {
        $categories = $this->fetchFromCache();

        if (count($categories) === 0) {
            $categories = $this->fetchFromDb();

            $this->store->put('categories', $categories);
        }

        return $categories;
    }

    protected function fetchFromCache(): array
    {
        try {
            $categories = $this->store->get('categories');

            if (!is_array($categories)) {
                return [];
            }

            return $categories;

        } catch (InvalidArgumentException) {
            return [];
        }
    }

    protected function fetchFromDb(): array
    {
        return Item::query()
            ->select('cat')
            ->distinct()
            ->orderBy('cat')
            ->pluck('cat')
            ->toArray();
    }
}
