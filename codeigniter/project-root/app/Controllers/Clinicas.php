<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Clinicas extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function listaClinicas()
  {
    $userModel = new \App\Models\UserModel();
    $info_usuarios = $userModel->getUsuarios();

    $dados = [
      'title' => 'Clínicas e Pet Shops',
      'dados' => $info_usuarios
    ];

    return view('listagem_clinicas/lista', $dados);
  }
}
