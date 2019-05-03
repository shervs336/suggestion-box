<?php

namespace Shervs336\SuggestionBox\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $guarded = [];

    protected $table = 'suggestions';

    public function comment()
    {
      return $this->hasMany('Shervs336\SuggestionBox\Models\Comment');
    }
}
