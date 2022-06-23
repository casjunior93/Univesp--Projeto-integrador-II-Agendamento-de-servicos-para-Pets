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

    $animalModel = new \App\Models\AnimalModel();
    $info_animais = $animalModel->getAnimaisPorIdUsuario($id_usuario_logado);

    //contagens
    $qtde_animais = count($info_animais);

    $qtde_animais_disponiveis = 0;
    foreach ($info_animais as $animal) {
      if ($animal['disponivel'] == 1) {
        $qtde_animais_disponiveis = $qtde_animais_disponiveis + 1;
      }
    }

    $qtde_animais_adotados = 0;
    foreach ($info_animais as $animal) {
      if ($animal['disponivel'] == 0) {
        $qtde_animais_adotados = $qtde_animais_adotados + 1;
      }
    }

    $dados = [
      'title' => 'Base do Dashboard',
      'info_usuario' => $info_usuario,
      'info_animais' => $info_animais,
      'qtde_animais' => $qtde_animais,
      'qtde_animais_adotados' => $qtde_animais_adotados,
      'qtde_animais_disponiveis' => $qtde_animais_disponiveis
    ];

    return view('dash/dashboard', $dados);
  }

  public function contatosAdocao()
  {
    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    $mensagemModel = new \App\Models\MensagemModel();
    $info_msgs = $mensagemModel->getMsgmPorIdUsuario($id_usuario_logado);

    //contagens
    $qtde_msgs = count($info_msgs);

    $qtde_msgs_disponiveis = 0;
    foreach ($info_msgs as $msg) {
      if ($msg['respondida'] == 1) {
        $qtde_msgs_disponiveis = $qtde_msgs_disponiveis + 1;
      }
    }

    $qtde_msgs_adotados = 0;
    foreach ($info_msgs as $animal) {
      if ($animal['respondida'] == 0) {
        $qtde_msgs_adotados = $qtde_msgs_adotados + 1;
      }
    }

    $dados = [
      'title' => 'Base do Dashboard',
      'info_usuario' => $info_usuario,
      'info_msgs' => $info_msgs,
      'info_msgs' => $info_msgs,
      'qtde_msgs_adotados' => $qtde_msgs_adotados,
      'qtde_msgs_disponiveis' => $qtde_msgs_disponiveis
    ];

    return view('dash/contatos-adocao', $dados);
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

  public function baseDashboard()
  {
    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    $dados = [
      'title' => 'Base do Dashboard',
      'info_usuario' => $info_usuario
    ];
    return view('dash/base', $dados);
  }
}
