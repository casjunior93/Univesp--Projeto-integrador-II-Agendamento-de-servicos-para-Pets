<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    return view('entre-cadastre-se');
  }

  public function registro()
  {
    return view('cadastre-se');
  }

  public function salvar()
  {
    echo 'Olá, Carlos';
  }
}
