<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserAuthResource;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function index_patient(Request $request)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return UserResource::collection(UserService::all_patient($perPage, $search));
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

    public function update(UserRequest $request, User $user)
    {
        $validate = $request->validated();
        UserService::update($validate, $user);
        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validate = $request->validated();
        $user = UserService::store($validate);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return new UserResource($user);
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
    /* public function update(User $request, $id)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $user = User::destroy($id);
    return response(['processed' => $user], 204);
    }


    public function login(LoginRequest $request)
    {
        //code...
        $validate = $request->validated();
        $user = UserService::login($validate);
        return new UserAuthResource($user);
        //return new UserResource($user);
    }

    public function change_password(ChangePasswordRequest $request, User $user)
    {
        //code...
      /*   $user = Auth::user(); */
        $validate = $request->validated();
        if ($validate["password"]){
            if (Hash::check($validate["password"], $user->password)) {
                $userNew = UserService::change_password($validate,$user);
                return new UserResource($userNew);
                }else{
                    abort(422, 'Password does not match');
                }
        }else{
            $userNew = UserService::change_password($validate,$user);
            return new UserResource($userNew); 
        }
       
        //return new UserResource($user);
    }

    public function me()
    {
        $user = Auth::user();
        return new UserResource($user);
    }

    public function logout()
    {
        //* pasar al servicio?
        if (Auth::user()) {
            Auth::user()->token()->revoke();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
