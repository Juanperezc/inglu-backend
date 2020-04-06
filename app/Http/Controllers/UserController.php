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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }


    public function login(LoginRequest $request)
    {
        //code...
        $validate = $request->validated();
        $user = UserService::login($validate);
        return new UserAuthResource($user);
        //return new UserResource($user);
    }

    public function change_password(ChangePasswordRequest $request)
    {
        //code...
        $user = Auth::user();
        $validate = $request->validated();
        if (Hash::check($validate["password"], $user->password)) {
        $user = UserService::change_password($validate);
        return new UserResource($user);
        }else{
            abort(422, 'Password does not match');
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
