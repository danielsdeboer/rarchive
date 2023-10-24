<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $hash
 * @property string $title
 * @property string $dt
 * @property string $cat
 * @property int|null $size
 * @property string|null $ext_id
 * @property string|null $imdb
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item scope(\App\Models\Scopes\ScopeInterface ...$scopes)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereImdb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereTitle($value)
 */
	class Item extends \Eloquent {}
}

