<?php

namespace App\Models;

use App\Models\Scopes\ScopeInterface;
use App\Support\Size;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'dt' => 'datetime'
    ];

    public function size(): Attribute
    {
        return new Attribute(get: fn ($value) => new Size($value));
    }

    public function scopeScope(
        Builder $builder,
        ScopeInterface ...$scopes,
    ): Builder {
        foreach ($scopes as $scope) {
            $builder = $scope->apply($builder);
        }

        return $builder;
    }
}
