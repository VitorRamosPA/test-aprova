<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserRegister;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserRegisterController extends Controller
{
    public function index(UserRegister $userRegister)
    {
        $userRegisters = $userRegister->all();
        return view('lista', compact('userRegisters'));
    }
    public function inicio()
    {
        return view('lista');
    }

    public function store(Request $request)
    {
        $post = new UserRegister;
        $post->nome = $request->nome;
        $post->cpf = $request->cpf;
        $post->rg = $request->rg;
        $post->nascimento = $request->nascimento;
        $post->sexo = $request->sexo;
        $post->save();
        return redirect('lista')->with('msg', 'Cadastrado com sucesso');
    }

    public function destroy($id)
    {
        UserRegister::findOrFail($id)->delete();

        return redirect('lista')->with('msg', 'Excluído com sucesso');
    }

    public function edit(UserRegister $userRegister,  )
    {
        $this->user_register_id = $userRegister->user_register_id;
        $this->nome = $userRegister->nome;
        $this->nascimento = $userRegister->nascimento;
        $this->cpf = $userRegister->cpf;
        $this->rg = $userRegister->rg;

    }
}
