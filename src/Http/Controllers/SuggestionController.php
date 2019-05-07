<?php

namespace Shervs336\SuggestionBox\Http\Controllers;

use Shervs336\SuggestionBox\Models\Suggestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::paginate(10);

        return view('suggestion-box::index', compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestion-box::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;

        $suggestion = Suggestion::create($inputs);

        flash()->success('New suggestion successfully saved!');

        return redirect(route('suggestions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        if(empty($suggestion)){
          flash()->error("Suggestion does not exists");

          return redirect(route('suggestions.index'));
        }

        $comments = $suggestion->comments()->paginate(1);

        return view('suggestion-box::show', compact('suggestion', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        if(empty($suggestion)){
          flash()->error("Suggestion does not exists");

          return redirect(route('suggestions.index'));
        }

        return view('suggestion::edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        if(empty($suggestion)){
          flash()->error("Suggestion does not exists");

          return redirect(route('suggestions.index'));
        }

        flash()->success("Suggestion successfully removed!");

        $suggestion->delete();

        return redirect(route('suggestions.index'));
    }
}
