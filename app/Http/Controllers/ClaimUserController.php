<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Claim\ClaimUserResource;
use App\Http\Requests\Claim\ClaimUserRequest;
use App\Services\ClaimUserService;
use App\ClaimUser;

class ClaimUserController extends Controller
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
        return ClaimUserResource::collection(ClaimUserService::all($perPage, $search));
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
    public function store(ClaimUserRequest $request)
    {
        $validate = $request->validated();
        $claim = ClaimUserService::store($validate);
        return new ClaimUserResource($claim);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClaimUser $claim)
    {
        return new ClaimUserResource($claim);
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
    public function update(ClaimUserRequest $request, ClaimUser $claimUser)
    {
        
        $validate = $request->validated();
      
        ClaimUserService::update($validate, $claimUser);
        return new ClaimUserResource($claimUser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = ClaimUser::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
