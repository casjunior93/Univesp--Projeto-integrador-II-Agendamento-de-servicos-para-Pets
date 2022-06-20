<?php

namespace App\Controllers;

use App\Libraries\Hash;

class ListagemAnimais extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function index()
  {
    $dados = [
      'title' => 'Animais para adoção'
    ];

    return view('listagem_animais/lista', $dados);
  }
}
