<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Income extends Model
{
    protected $fillable = [
        'hashed_id', 'date', 'category_id', 'amount', 'description', 'user_id', 'cloudinary_url',
    ];

    protected $dates = [
        'date'
    ];

    /**
     * Category relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }

    /**
     * Explicit Route model binding
     * @param mixed $value
     * @return Model|null
     */
    public function resolveRouteBinding($value)
    {
        return $this->where('hashed_id', $value)->where('user_id', auth()->user()->id)->first() ?? abort(404);
    }

    /**
     * Current Use scope
     * @param Builder $query
     * @return mixed
     */
    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
}
