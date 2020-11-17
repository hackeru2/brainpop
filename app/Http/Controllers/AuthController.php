<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\Teacher,App\Models\Student , App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleWare('auth:api')->except(["login",'loginStudentOrTeacher']);
    }

    public function login()
    {   
        
        $credentials= request(['email','password']);

         if(!$token = auth()->attempt($credentials))
            return $this->invalidCredentials();

       return   $this->respondWithToken($token);


    }

    private function respondWithToken($token)
    {
        
        return response()->json(
            ['token' =>  $token ,
            'access_type' => 'bearer' ,
            'expires_in' => auth('api')->factory()->getTTL() * 60 ]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['msg' =>  'User Successfully logged out'] );
    }

    public function refresh()
    {
        return  $this->respondWithToken(auth()->refresh() );   

    }

    public function me()
    {
        return  $this->response()->json(auth()->user() );   

    }

    public function loginStudentOrTeacher( Request $request)
    {
        
        $member =   Teacher::where('email',  $request->email )->first() ?: Student::where('email',  $request->email )->first() ;

        if(!$member || !$this->validatePasswordMember($member , $request->password)) return $this->invalidCredentials();

        $token = auth('api')->login(User::find(2));
        return   $this->respondWithToken($token);

    }
    public function invalidCredentials()
    {
        return response()->json(['error' => 'Invalid credentials', 401 ]);
    }

    public function validatePasswordMember($model , $password )
    {
        return Hash::check($password,  $model->password) ;
    }
}
