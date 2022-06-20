<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Listagem extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function listaAnimais()
  {
    $dados = [
      'title' => 'Animais para adoção'
    ];

    return view('listagem_animais/lista', $dados);
  }

  public function listaClinicas()
  {
    $dados = [
      'title' => 'Clínicas e Pet Shops'
    ];

    return view('listagem_clinicas/lista', $dados);
  }
}
