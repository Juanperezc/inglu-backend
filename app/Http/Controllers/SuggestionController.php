<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Suggestion\SuggestionResource;
use App\Http\Requests\Suggestion\SuggestionRequest;

use App\Services\SuggestionService;
use App\Suggestion;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return SuggestionResource::collection(SuggestionService::all($perPage, $search));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuggestionRequest $request)
    {
        $validate = $request->validated();
        $suggestion = SuggestionService::store($validate);
        return new SuggestionResource($suggestion);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        return new SuggestionResource($suggestion);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuggestionRequest $request, Suggestion $suggestion)
    {
        $validate = $request->validated();
        SuggestionService::update($validate, $suggestion);
        return new SuggestionResource($suggestion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Suggestion::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
