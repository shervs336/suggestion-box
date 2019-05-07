<?php

namespace Shervs336\SuggestionBox\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $guarded = [];

    protected $table = 'suggestions';

    public function comments()
    {
      return $this->hasMany('Shervs336\SuggestionBox\Models\Comment');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
