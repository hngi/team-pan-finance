<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
      'user_id', 'item', 'description', 'amount', 'date'
    ];

    protected $dates = [
      'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
}
