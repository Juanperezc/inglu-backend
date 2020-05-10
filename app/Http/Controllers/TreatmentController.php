<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Treatment\TreatmentResource;
use App\Http\Requests\Treatment\TreatmentRequest;
use App\Services\TreatmentService;
use App\Treatment;

class TreatmentController extends Controller
{
    //
      //
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
        return TreatmentResource::collection(TreatmentService::all($perPage, $search));
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
    public function store(TreatmentRequest $request)
    {
        $validate = $request->validated();
        $treatment = TreatmentService::store($validate);
        
        return $treatment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
        return new TreatmentResource($treatment);
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
    public function update(TreatmentRequest $request, Treatment $treatment)
    {
        $validate = $request->validated();
        TreatmentService::update($validate, $treatment);
        return new TreatmentResource($treatment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Treatment::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
