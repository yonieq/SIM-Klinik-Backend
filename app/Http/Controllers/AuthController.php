<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserLogin;
use App\Http\Requests\ValidateUserRegistration;
use App\Http\Resources\User as UserResource;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(ValidateUserRegistration $request)
    {

        $user = ModelsUser::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'password' => bcrypt($request->password),
            'username'=> $request->username,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'kategori'=> $request->kategori,
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp,
            'gaji'=> $request->gaji,
            'foto'=> $request->foto
        ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Regidtered.',
            'token' => $user
        ]);;
    }

    public function login(ValidateUserLogin $request)
    {

        $credentials = request(['username', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return  response()->json([
                'errors' => [
                    'msg' => ['Incorrect username or password.']
                ]
            ], 401);
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Logged in.',
            'role'=> auth()->user()->kategori,
            'token' => $token
        ]);
    }

    public function user()
    {
        return auth()->user();
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
