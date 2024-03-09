<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Exception;
use Hash;
use Auth;

class UserController extends Controller
{
    public function create_account(){
        return view('auth.register');
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20|confirmed'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],401);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'status' => true,
            'message' => "User inserted successfully.",
            'user' => $user
        ]);
    }
    public function login_account(){
        return view('auth.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],400);
        }else{
            try{
                $credentials = $request->only('email', 'password');
                $token = Auth::attempt($credentials);
                if (!$token) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid credentials.',
                    ], 401);
                }
                $user = Auth::user();
                Auth::login($user);
                    return response()->json([
                        'status' => true,
                        'message' => 'Login successfully.',
                        'url'     => route('dashboard'),
                        'user' => $user,
                        'authorisation' => [
                            'token' => $token,
                            'type' => 'Bearer',
                            'expires_in' => Auth::factory()->getTTL()*60
                        ]
                    ]);
            }catch(Exception $e){
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }
    public function logout(Request $request){
        try{
            Auth::logout();
            return response()->json([
                'status' => true,
                'message' => "User logged out."
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ],200);
        }
    }
    public function dashboard(){
        $users = User::orderBy('id','desc')->paginate(10);
        return view('dashboard',compact('users'));
    }
}
