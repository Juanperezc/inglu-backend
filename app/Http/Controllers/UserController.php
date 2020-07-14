<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\RecoverPassword;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RecoverPasswordRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserWorkspaceRequest;
use App\Http\Requests\User\UserSpecialtyRequest;
use App\Http\Requests\User\UserMedicalRecordRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserAuthResource;
use App\Http\Resources\User\UserSpecialtyResource;
use App\Http\Resources\User\UserWorkspaceResource;
use App\Http\Resources\User\UserMedicalRecordResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\UserService;
use App\User;
use App\UserWorkspace;

use App\Notifications\NewPatient;


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
    public function index_doctors(Request $request)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return UserResource::collection(UserService::all_doctors($perPage, $search));
    }
  
    public function index_doctors_specialty(Request $request)
    {
        $specialty_id = $request->input('specialty_id', 1);
        return UserResource::collection(UserService::all_doctors_by_specialty($specialty_id));
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

    public function update_medical_record(UserMedicalRecordRequest $request, User $user)
    {
        $validate = $request->validated();
        UserService::update_medical_record($validate, $user);
        return /* new UserMedicalRecordResource( */$user;/* ); */
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
        $password = Str::random(7);
        $user->password = $password;
        $user->save();
        if ($user->type == 1){
            //* notify
            Notification::send($user, new NewPatient($password));
        }
        return new UserResource($user);
    }

    public function store_specialty(UserSpecialtyRequest $request, User $user)
    {
        $validate = $request->validated();
        $userNew = UserService::store_specialty($validate,$user);
        return UserSpecialtyResource::collection($user->specialties);
    }

    public function store_workspace(UserWorkspaceRequest $request, User $user)
    {
        $validate = $request->validated();
        $userNew = UserService::store_workspace($validate,$user);
        return ["success" => $userNew];/* UserSpecialtyResource::collection($user->workspace); */
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


    public function show_specialties(User $user)
    {
        //
        return UserSpecialtyResource::collection($user->specialties);
    }

    public function show_workspaces(User $user)
    {
        //
        $user_workspace = UserWorkspace::where('user_id', $user->id)->get();
        return UserWorkspaceResource::collection($user_workspace);
    }


    public function show_medical_record(User $user)
    {
        //
        $resource = $user->medical_record;
        if ($resource){
            return new UserMedicalRecordResource($resource);
        }else {
            return response(['data' => null], 200);
        }
        
      
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

    public function delete_specialty(UserSpecialtyRequest $request, User $user)
    {
    $validate = $request->validated();
    $response = $user->specialties()->detach($validate["specialty"]);
    return response(['processed' => $response], 204);
    }


    public function delete_workspace(Request $request, User $user)
    {
        $response = UserWorkspace::destroy($request->input('user_workspace_id'));
 /*    $response = $user->workspaces()->detach(); */
/*     $user->save(); */
    return response(['processed' => $response], 200);
    }

    public function login(LoginRequest $request)
    {
        //code...
        $validate = $request->validated();
        $user = UserService::login($validate);
        return new UserAuthResource($user);
        //return new UserResource($user);
    }

    public function recover_password(RecoverPasswordRequest $request)
    {
        //code...
        $validate = $request->validated();
        $recover_password = UserService::recover_password($validate);
          //* notify
        Notification::send($recover_password["user"], new RecoverPassword($recover_password["password"]));
        return new UserResource($recover_password["user"]);
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

    public function read_notifications()
    {
        //
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
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
