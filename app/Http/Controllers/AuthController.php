<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function registrar(Request $request){
        $campos = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $campos['name'],
            'email' => $campos['email'],
            'password' => bcrypt($campos['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([ 'message' => 'Desconectado'], 200);
    }

    public function login(Request $request){
        $campos = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Verifica o email 
        $user = User::where('email', $campos['email'])->first();

        // Verifica a senha
        if(!$user || !Hash::check($campos['password'], $user->password)){
            return response()->json(['message' => 'Usuário ou senha inválido'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
