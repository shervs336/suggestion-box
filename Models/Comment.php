<?php

namespace Shervs336\SuggestionBox\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $table = 'comments';

    public function suggestion()
    {
      return $this->belongsTo('Shervs336\SuggestionBox\Models\Suggestion');
    }
}
