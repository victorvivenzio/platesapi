<?php

namespace App;

use App\Allergen;
use App\Plate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Ingredient
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient query()
 * @mixin \Eloquent
 */
class Ingredient extends Model
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

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class);
    }

    public function plates()
    {
        return $this->belongsToMany(Plate::class);
    }
}
