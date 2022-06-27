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
    $info_usuarios = $userModel->getUsuariosComServicos();

    $serModel = new \App\Models\ServicosModel();
    $info_servicos = $serModel->getServicos();

    $dados = [
      'title' => 'Clínicas e Pet Shops',
      'dados' => $info_usuarios,
      'servicos' => $info_servicos
    ];

    return view('listagem_clinicas/lista', $dados);
  }
}
