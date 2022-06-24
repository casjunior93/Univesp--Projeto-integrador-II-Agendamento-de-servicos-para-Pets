<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Servicos extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function salvar()
  {
    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');

    //registrando no banco de dados
    $nome = $this->request->getPost('nome');
    $valor = $this->request->getPost('valor');
    $id_usuario = $this->request->getPost('id_usuario');

    $values = [
      'nome' => $nome,
      'valor' => $valor,
      'id_usuario' => $id_usuario_logado
    ];

    $servicoModel = new \App\Models\ServicosModel();
    $query = $servicoModel->insert($values);
    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados');
    } else {
      $id_servico = $servicoModel->insertID();

      //return redirect()->to('/dashboard');
      return redirect()->to('dashboard/servicos')->with('success', 'Serviço foi registrado com sucesso!');
    }
  }

  public function excluirServico()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id do animal
    $id_servico = $this->request->getPost('id-servico');

    $servicoModel = new \App\Models\ServicosModel();

    $query = $servicoModel->excluirServico($id_servico);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('dashboard/servicos')->with('success', 'Serviço excluído!')->with('nome', $info_usuario['nome']);
    }
  }
}
