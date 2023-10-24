<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Scopes\CategoryScope;
use App\Models\Scopes\ImdbScope;
use App\Models\Scopes\LatestScope;
use App\Models\Scopes\TitleScope;
use App\Repo\Categories;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Factory $view, Request $request, Categories $categories)
    {
        $items = Item::query()
            ->scope(
                new TitleScope($request->input('title') ?? ''),
                new ImdbScope($request->input('imdb') ?? ''),
                new CategoryScope(
                    $request->input('category') ?? '',
                    $request->boolean('include_xxx'),
                ),
                new LatestScope(),
            )
            ->paginate(48)
            ->withQueryString();

        return $view->make('index', [
            'items' => $items,
            'categories' => $categories->all(),
            'queryTitle' => $request->input('title'),
            'queryImdb' => $request->input('imdb'),
            'queryCategory' => $request->input('category'),
            'queryIncludeXxx' => $request->boolean('include_xxx'),
        ]);
    }
}
