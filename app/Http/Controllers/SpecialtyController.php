<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Specialty\SpecialtyResource;
use App\Http\Requests\Specialty\SpecialtyRequest;
use App\Services\SpecialtyService;
use App\Specialty;

class SpecialtyController extends Controller
{
    //
    public function  index(Request $request){
           //
           $perPage = $request->input('per_page', 10);
           $search = $request->input('search');
           $all = $request->input('all', false);
           return SpecialtyResource::collection(SpecialtyService::all($perPage, $search));
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
    public function store(SpecialtyRequest $request)
    {
        $validate = $request->validated();
        $specialty = SpecialtyService::store($validate);
        
        return new SpecialtyResource($specialty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
        return new SpecialtyResource($specialty);
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
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        $validate = $request->validated();
        SpecialtyService::update($validate, $specialty);
        return new SpecialtyResource($specialty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Specialty::destroy($id);
        return response(['processed' => $processed], 204);
    }

   
}
