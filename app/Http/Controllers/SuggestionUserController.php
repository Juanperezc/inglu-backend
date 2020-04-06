<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Suggestion\SuggestionUserResource;
use App\Http\Requests\Suggestion\SuggestionUserRequest;
use App\Services\SuggestionUserService;
use App\SuggestionUser;


class SuggestionUserController extends Controller
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
        return SuggestionUserResource::collection(SuggestionUserService::all($perPage, $search));
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
    public function store(SuggestionUserRequest $request)
    {
        $validate = $request->validated();
        $suggestion = SuggestionUserService::store($validate);
        return new SuggestionUserResource($suggestion);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuggestionUser $suggestion)
    {
        return new SuggestionUserResource($suggestion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuggestionUserRequest $request, SuggestionUser $suggestionUser)
    {
        
        $validate = $request->validated();
      
        SuggestionUserService::update($validate, $suggestionUser);
        return new SuggestionUserResource($suggestionUser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = SuggestionUser::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
