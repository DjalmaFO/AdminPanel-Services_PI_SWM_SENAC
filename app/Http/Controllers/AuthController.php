<?php

namespace App\Http\Controllers;

use App\Models\InfoUser;
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
        $user = \auth()->user();
        $infoAtual = $user->perfil()->first();

        return response()->json(['user' => $user, 'info' => $infoAtual], 200);
    }

    public function updatePerfil(Request $request){
        $user = auth()->user();
        $infoAtual = InfoUser::where('id_user', $user->id)->first();

        $campos = $request->validate([
            'sobrenome' => 'string',
            'cep' => 'string|size:8',
            'endereco' => 'string',
            'numero' => 'string',
            'complemento' => 'string',
            'bairro' => 'string',
            'cidade' => 'string',
            'estado' => 'string',
        ]);

        if(empty($infoAtual)){
            InfoUser::create([
                'sobrenome' => $campos['sobrenome'],
                'cep' => $campos['cep'],
                'endereco' => $campos['endereco'],
                'numero' => $campos['numero'],
                'complemento' => $campos['complemento'],
                'bairro' => $campos['bairro'],
                'cidade' => $campos['cidade'],
                'estado' => $campos['estado'],
                'id_user' => $user->id,
            ]);
        } else {
            InfoUser::where('id_user', $user->id)->update([
                'sobrenome' => $campos['sobrenome'],
                'cep' => $campos['cep'],
                'endereco' => $campos['endereco'],
                'numero' => $campos['numero'],
                'complemento' => $campos['complemento'],
                'bairro' => $campos['bairro'],
                'cidade' => $campos['cidade'],
                'estado' => $campos['estado'],
            ]);
        }


        if ($request->hasFile('img_user') && $request->file('img_user')->isValid()) {
            $caminhoImagem = $request->file('img_user')->store('img/users');

            InfoUser::where('id_user', $user->id)->update([
                'img_user' => $caminhoImagem,
            ]);
        }

        //atualiza o nome do Usuário
        $request->validate([
            'name' => 'required|string'
        ]);

        User::where('id', $user->id)->update(['name' => $request->name]);


        return response()->json(['msg' => 'Perfil atualizado com sucesso'], 200);
    }
}
