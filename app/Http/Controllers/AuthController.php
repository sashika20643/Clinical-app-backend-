<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Http\Requests\StoreUserRequest;
use \App\Http\Requests\LoginUserRequest;



class AuthController extends Controller
{

    use HttpResponses;
public function login(LoginUserRequest $request){

    $request->validated($request->all());

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'patientNo';

    // Add the login type to the credentials array
    $credentials = [
        $loginType => $request->login,
        'password' => $request->password
    ];
    if(!Auth::attempt($credentials)) {
        return $this->error('', 'Credentials do not match', 401);
    }

    if($loginType=='email'){
        $user = User::where('email', $request->login)->first();

    }
    else{
    $user = User::where('patientNo', $request->login)->first();

    }

    return $this->success([
        'user' => $user,
        'token' => $user->createToken('API Token')->plainTextToken
    ]);


    return "this is login";
}

public function register(StoreUserRequest $request){

$request->validated($request->all());
$user=User::create(
    [
        'name'=>$request->name,
        'email'=> $request->email,
        'password'=>Hash::make($request->password),
        'surName'=>$request->surName,
        'patientNo'=>$request->patientNo,
        'dateOfBirth'=>$request->dateOfBirth,
        'phone'=>$request->phone,



    ]
    );


    return $this->success([
        'user' => $user,
        'token' => $user->createToken('API Token')->plainTextToken
    ]);


}
public function logout(){
   Auth::user()->currentAccessToken()->delete();
   return $this->success([
    'message' => "you have been logout successfuly."
]);

}
}
