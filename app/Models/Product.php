<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $store_id
 * @property integer $product_category_id
 * @property string $name
 * @property string $slug
 * @property integer $price
 * @property int $stock
 * @property string $description
 * @property mixed $extra_info
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Store $store
 * @property CartItem[] $cartItems
 * @property OrderItem[] $orderItems
 * @property ProductCategory[] $categories
 * @property ProductImage[] $images
 * @property ProductRating[] $ratings
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['store_id', 'product_category_id', 'name', 'slug', 'price', 'stock', 'description', 'extra_info', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    protected $appends = [
        'rating_avg'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'extra_info' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\ProductRating');
    }

    public function getRatingAvgAttribute()
    {
        return $this->ratings->where('is_flagged', 0)->avg('rate');
    }
}
