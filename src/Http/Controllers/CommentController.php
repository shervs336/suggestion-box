<?php

namespace Shervs336\SuggestionBox\Http\Controllers;

use Shervs336\SuggestionBox\Models\Comment;
use Shervs336\SuggestionBox\Models\Suggestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Suggestion $suggestion, Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;

        $comment = $suggestion->comments()->create($inputs);

        flash()->success('New comment successfully saved!');

        return redirect(route('suggestions.show', $suggestion));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion, Comment $comment, Request $request)
    {
        if(empty($comment)){
          flash()->error('Comment not found!');

          return redirect(route('suggestions.show', $suggestion));
        }

        $comment->delete();

        flash()->success('Comment successfully removed!');

        return redirect(route('suggestions.show', $suggestion));
    }

}
