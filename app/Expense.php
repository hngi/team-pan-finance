<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
      'hashed_id', 'user_id', 'item', 'description', 'amount', 'date', 'picture_url',
    ];

    protected $dates = [
      'date'
    ];

    protected $hidden = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function resolveRouteBinding($value)
    {
       return $this->where('hashed_id', $value)->where('user_id', auth()->user()->id)->first() ?? abort(404);
    }
}
