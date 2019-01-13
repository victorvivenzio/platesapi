<?php

namespace App;

use App\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Allergen
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Allergen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Allergen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Allergen query()
 * @mixin \Eloquent
 */
class Allergen extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function plates()
    {
        return $this->ingredients()
            ->with('plates')
            ->get()
            ->pluck('plates')
            ->collapse()
            ->unique('id')
            ->values();
    }

}
