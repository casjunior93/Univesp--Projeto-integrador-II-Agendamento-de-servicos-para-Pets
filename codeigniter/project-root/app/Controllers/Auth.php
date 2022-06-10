<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    return view('auth/login');
  }

  public function registro()
  {
    return view('auth/registro');
  }

  public function salvar()
  {
    echo 'Olá, Carlos';
  }
}
