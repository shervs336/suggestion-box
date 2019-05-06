<?php

namespace Shervs336\SuggestionBox\Facades;

use Illuminate\Support\Facades\Facade;

class SuggestionFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
      return \Shervs336\SuggestionBox\Tools\Suggestion::class;
  }

}
