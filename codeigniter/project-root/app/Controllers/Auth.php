<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function __construct()
  {
    helper(['url', 'form']);
  }

  public function index()
  {
    return view('auth/entre-cadastre-se');
  }

  public function registro()
  {
    return view('auth/cadastre-se');
  }

  public function salvar()
  {
    //validando campos do formulario
    $validation = $this->validate([
      'nome' => 'required',
      'email' => 'required|valid_email|is_unique[usuarios.email]',
      'senha' => 'required|min_length[5]|max_length[12]',
      'senha2' => 'required|min_length[5]|max_length[12]|matches[senha]',
      'cep' => 'required',
      'rua' => 'required',
      'cidade' => 'required',
      'estado' => 'required',
      'complemento' => 'required',
      'responsavel' => 'required',
      'telefone' => 'required'
    ]);

    if (!$validation) {
      return view('auth/cadastre-se', ['validation' => $this->validator]);
    } else {
      echo 'Form validado com sucesso';
    }
  }
}
