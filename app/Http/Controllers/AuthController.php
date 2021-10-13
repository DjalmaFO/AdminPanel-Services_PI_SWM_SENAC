<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TbCarrinho;

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
            'password' => Hash::make($campos['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['nome' => $user->nm_user, 'token' => $token], 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([ 'message' => 'Desconectado'], 200);
    }

    public function sair(Request $request){
        if(auth()->user()){
            auth()->user()->tokens()->delete();
        }
        auth()->logout();

        return \view('welcome');
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

        return response()->json(['nome' => $user->name, 'token' => $token], 201);
    }

    public function newLogin(){
        return \view('auth.new_login');
    }

    public function newRegister(Request $request){
        $campos = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $campos['name'],
            'email' => $campos['email'],
            'password' => Hash::make($campos['password']),
        ]);

        $user->createToken('myapptoken')->plainTextToken;

        return \redirect()->route('dashboard');
    }

    public function perfil(){
        return \view('users.perfil.perfil')->with('usuario', \auth()->user());
    }
}
