<?php

namespace App;

use App\Category;
use App\Ingredient;
use App\Allergen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Plate
 *
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate query()
 * @mixin \Eloquent
 */
class Plate extends Model
{
    use SoftDeletes, LogsActivity;

    const PLATE_AVALAIBLE = 1;
    const PLATE_NOT_AVALAIBLE = 0;
    protected $date = ['deleted_at'];
    protected static $logFillable = true;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'category_id',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function isAvailable()
    {
        return $this->status == Plate::PLATE_AVALAIBLE;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
    public function allergens()
    {
        return $this->ingredients()
            ->with('allergens')
            ->get()
            ->pluck('allergens')
            ->collapse()
            ->unique('id')
            ->values();;
    }

}
