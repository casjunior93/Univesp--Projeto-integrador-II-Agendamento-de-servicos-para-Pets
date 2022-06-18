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
    //Luciana
    //troca para o arquivo index do dashboard
    return view('dash/dashboard');
  }

  public function cadastroServico()
  {
    //troca para o arquivo de cadastro de serviço
    return view('dash/cadastre-se');
  }

  public function cadastroAnimal()
  {
    //troca para o arquivo de cadastro de animal
    return view('dash/recuperar-senha');
  }
}
