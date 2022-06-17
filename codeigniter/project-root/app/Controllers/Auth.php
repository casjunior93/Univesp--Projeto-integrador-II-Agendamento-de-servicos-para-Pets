<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Auth extends BaseController
{
  public function __construct()
  {
    helper(['Form']);
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
      'responsavel' => 'required',
      'telefone' => 'required'
    ]);

    if (!$validation) {
      return view('auth/cadastre-se', ['validation' => $this->validator]);
    } else {
      #echo 'Form validado com sucesso';
      //registrando no banco de dados
      $nome = $this->request->getPost('nome');
      $email = $this->request->getPost('email');
      $senha = $this->request->getPost('senha');
      $cep = $this->request->getPost('cep');
      $rua = $this->request->getPost('rua');
      $cidade = $this->request->getPost('cidade');
      $estado = $this->request->getPost('estado');
      $complemento = $this->request->getPost('complemento');
      $responsavel = $this->request->getPost('responsavel');
      $telefone = $this->request->getPost('telefone');

      $values = [
        'nome' => $nome,
        'email' => $email,
        'senha' => Hash::make($senha),
        'cep' => $cep,
        'rua' => $rua,
        'cidade' => $cidade,
        'estado' => $estado,
        'complemento' => $complemento,
        'responsavel' => $responsavel,
        'telefone' => $telefone
      ];

      $userModel = new \App\Models\UserModel();
      $query = $userModel->insert($values);
      if (!$query) {
        return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados');
      } else {
        return redirect()->to('entre-cadastre-se')->with('success', 'Registrado com sucesso! Faça login com suas credenciais.');
      }
    }
  }

  function logar()
  {
    //validando campos do formulario
    $validation = $this->validate([
      'email' => 'required|valid_email|is_not_unique[usuarios.email]',
      'senha' => 'required|min_length[5]|max_length[12]',
    ]);

    if (!$validation) {
      return view('auth/entre-cadastre-se', ['validation' => $this->validator]);
    } else {
      //Buscando o usuário

      $email = $this->request->getPost('email');
      $senha = $this->request->getPost('senha');
      $userModel = new \App\Models\UserModel();
      $usuario_info = $userModel->where('email', $email)->first();
      $check_senha = Hash::check($senha, $usuario_info['senha']);

      if (!$check_senha) {
        session()->setFlashdata('fail', 'Senha incorreta');
        return redirect()->to('entre-cadastre-se')->withInput();
      } else {
        $user_id = $usuario_info['id'];
        session()->set('loggedUser', $user_id);
        #return redirect()->to('/dashboard');
        echo 'Olá, ' . $usuario_info['nome'];
      }
    }
  }
}
