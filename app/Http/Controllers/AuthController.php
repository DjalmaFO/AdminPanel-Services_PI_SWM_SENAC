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
            'nm_user' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'senha' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'nm_user' => $campos['nm_user'],
            'email' => $campos['email'],
            'senha' => bcrypt($campos['senha']),
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
            'senha' => 'required|string',
        ]);

        // Verifica o email 
        $user = User::where('email', $campos['email'])->first();

        // Verifica a senha
        if(!$user || !Hash::check($campos['senha'], $user->senha)){
            return response()->json(['message' => 'Usuário ou senha inválido'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function carrinho(){
        $carrinho = auth()->user()->getCarrinho()->first();
        
        if(empty($carrinho)){
            $idUser = auth()->user()->id;
            $carrinho = TbCarrinho::create([
                'id_user' => $idUser,
            ]);

            return response()->json($carrinho, 200);
        }


        return response()->json($carrinho, 200);
    }
}
