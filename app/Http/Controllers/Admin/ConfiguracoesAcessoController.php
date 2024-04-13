<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ConfiguracoesAcessoController extends Controller {

    public function Acesso() {

        return view('admin.acesso', ['usuario' => Auth::user()]);
    }

    public function AtualizarAcesso(Request $request) {

        $usuario = Auth::user();

        $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string',
            'nova_senha' => 'string|min:8',
        ]);


        if (Hash::check($request->senha, $usuario->password)) {

            $usuario->login = $request->login;

            if ($request->nova_senha) {
                $usuario->password = Hash::make($request->nova_senha);
            }

            $usuario->save();

            return redirect()->route('admin.configuracoes.acesso')->with('success', 'Senha alterada com sucesso');
        }

        throw ValidationException::withMessages([
            'senha' => 'A senha informada está incorreta.',
        ]);
    }

}
