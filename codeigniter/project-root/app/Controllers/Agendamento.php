<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Agendamento extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function salvar()
  {
    //registrando no banco de dados
    $nome = $this->request->getPost('nome');
    $nome_animal = $this->request->getPost('nome_animal');
    $email = $this->request->getPost('email');
    $telefone = $this->request->getPost('telefone');
    $vacinas = $this->request->getPost('vacinas');
    $servicos = json_encode($this->request->getPost('servicos'));
    $data = $this->request->getPost('data');
    $hora = $this->request->getPost('hora');
    $minuto = $this->request->getPost('minuto');
    $recados = $this->request->getPost('recados');
    $metodo_pagamento = $this->request->getPost('metodo_pagamento');
    $id_usuario = $this->request->getPost('id_usuario');

    $values = [
      'nome' => $nome,
      'nome_animal' => $nome_animal,
      'email' => $email,
      'telefone' => $telefone,
      'vacinas' => $vacinas,
      'servicos' => $servicos,
      'data' => $data,
      'hora' => $hora,
      'minuto' => $minuto,
      'recados' => $recados,
      'metodo_pagamento' => $metodo_pagamento,
      'id_usuario' => $id_usuario
    ];

    $agenModel = new \App\Models\AgendamentoModel();
    $data_duplicada = $agenModel->verificaAgDuplicado($data, $hora, $minuto, $id_usuario);

    if (empty($data_duplicada)) {

      $query = $agenModel->insert($values);
      if (!$query) {
        return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados');
      } else {
        $id_agen = $agenModel->insertID();

        //return redirect()->to('/dashboard');
        return redirect()->to('clinicas')->with('success', 'Agendamento foi registrado com sucesso!');
      }
    } else {
      return redirect()->back()->with('fail', 'Data indisponível');
    }
  }

  public function marcarRespondida()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id mensagem
    $id_mensagem = $this->request->getPost('id-mensagem');

    $agenModel = new \App\Models\AgendamentoModel();

    $query = $agenModel->atualizaAgParaRespondido($id_mensagem);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('dashboard/agendamentos')->with('success', 'Agendamento marcado como respondido!')->with('nome', $info_usuario['nome']);
    }
  }

  public function marcarAceita()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id mensagem
    $id_mensagem = $this->request->getPost('id-mensagem');

    $agenModel = new \App\Models\AgendamentoModel();

    $query = $agenModel->atualizaAgParaRespondido($id_mensagem);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('dashboard/agendamentos')->with('success', 'Agendamento marcado como realizado!')->with('nome', $info_usuario['nome']);
    }
  }

  public function excluirAg()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id do animal
    $id_mensagem = $this->request->getPost('id-mensagem');

    $agenModel = new \App\Models\AgendamentoModel();

    $query = $agenModel->excluirAgendamento($id_mensagem);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('dashboard/agendamentos')->with('success', 'Agendamento excluído!')->with('nome', $info_usuario['nome']);
    }
  }
}
