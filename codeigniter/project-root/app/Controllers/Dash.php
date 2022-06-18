<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Dash extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function index()
  {
    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    $dados = [
      'title' => 'Dashboard',
      'info_usuario' => $info_usuario
    ];

    return view('dash/dashboard', $dados);
  }

  public function cadastroServico()
  {
    //Luciana
    //troca para o arquivo de cadastro de serviço
    return view('dash/cadastre-se');
  }

  public function cadastroAnimal()
  {
    //troca para o arquivo de cadastro de animal
    return view('dash/recuperar-senha');
  }
}
