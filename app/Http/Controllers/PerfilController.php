<?php

namespace App\Http\Controllers;

use App\Models\InfoUser;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
    {
        $user = \auth()->user();
        $infoAtual = InfoUser::where('id_user', $user->id)->first();
        return \view('users.perfil.perfil')->with(['user' => $user, 'info' => $infoAtual]);
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }
    public function edit(Perfil $perfil)
    {
        $user = \auth()->user();
        $infoAtual = InfoUser::where('id_user', $user->id)->first();
        return \view('users.perfil.edit')->with(['user' => $user, 'info' => $infoAtual]);
    }

    public function update(Request $request, $idUser)
    {
        $infoAtual = InfoUser::where('id_user', $idUser)->first();

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
                'id_user' => $idUser,
            ]);
        } else {
            InfoUser::where('id_user', $idUser)->update([
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

            InfoUser::where('id_user', $idUser)->update([
                'img_user' => $caminhoImagem,
            ]);
        }

        //atualiza o nome do Usuário
        $request->validate([
            'name' => 'required|string'
        ]);

        User::where('id', $idUser)->update(['name' => $request->name]);


        session()->flash('success', 'Perfil atualizado com sucesso');
        return \redirect()->route('perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
